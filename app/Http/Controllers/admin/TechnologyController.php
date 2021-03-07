<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Technology;
use File;
use DB;

class TechnologyController extends Controller
{
     public function view_technology()
	{
		$edit_technology= technology::where('id','>',0)->orderBy('id', 'Desc')->first();
		// if($edit_technology=='')
		// 	{ echo "no data";	return view('back.create_technology');}
		// // echo json_encode($edit_technology);
		// return view('back.create_technology',compact('edit_technology'));
		// $get=technology::where('id','>',0)->first();
		
		// return view('back.create_technology')->with('edit_technology',$edit_technology);
	return view('back.create_technology',compact('edit_technology'));
	}
	public function create_technology(Request $request)
	{
		if($request->has('technology_status')){$status=1;}else{$status=0;}
		if($request->has('technology_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('technology_img')){      
			$file=$request->file('technology_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/technology/', $fileName);      
		}  
		else{$fileName = 'noimage.jpg';}
		$create_technology= new technology;
		$create_technology->technology_title=$request->technology_title;
		$create_technology->technology_text=$request->technology_text;
		$create_technology->technology_img=$fileName;
		$create_technology->technology_url=$request->technology_url;
		$create_technology->technology_slug=$request->technology_slug;
		$create_technology->technology_tag=$request->technology_tag;
		$create_technology->technology_status=$status;
		$create_technology->technology_future_post=$request->technology_future_post;
		$create_technology->technology_popular=$popular;
		$create_technology->save();
		
// error from future post, 
		
		return back()->with('message_cr','Your Post Created');
	}
	public function listed_technology()
	{
		$listed_technology=technology::where('deleted_at')->orderBy('id','Desc')->get();
		$listed_technology_count=DB::table('technologies')->whereNotNull('deleted_at')->count();
		// dd($listed_technology_count);die;
		return view('back.listed_technology',compact('listed_technology','listed_technology_count'));
	}
	public function edit_technology($id)
	{
		$edit_technology=technology::findorFail($id);
		return view('back.edit_technology',compact('edit_technology'));
	}
	public function update_technology(Request $request,$id)
	{
		if($request->has('technology_status')){$status=1;}else{$status=0;}
		if($request->has('technology_popular')){$popular=1;}else{$popular=0;}
		$update_technology=  technology::findorFail($id);
		if($request->hasfile('technology_img')){      
			$file=$request->file('technology_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/technology/', $fileName);  
			File::Delete('image/admin/technology/'.$update_technology->technology_img);    
		}  
		else{$fileName = $update_technology->technology_img;}
		
		$update_technology->technology_title=$request->technology_title;
		$update_technology->technology_text=$request->technology_text;
		$update_technology->technology_img=$fileName;
		$update_technology->technology_url=$request->technology_url;
		$update_technology->technology_slug=$request->technology_slug;
		$update_technology->technology_tag=$request->technology_tag;
		$update_technology->technology_status=$status;
		$update_technology->technology_future_post=$request->technology_future_post;
		$update_technology->technology_popular=$popular;
		$update_technology->update();
		return back()->with('message_up','Post Updated');
	}
	public function delete_technology($id)
	{
		$delete_technology=technology::findorFail($id);
		$delete_technology->delete();
		return Redirect()->route('admin/listed_technology')->with('message_ds','Your Post Has Been Deleted');
	}


	// Ajax for technology
	public function get_technology()
	{
		$edit_technology= technology::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_technology);
		
	} 
	public function get_technology_edit()
	{
		$edit_technology= technology::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_technology);
		
	} 
	public function wontechnology()
	{
		$technology_slide=technology::where('technology_status',1)->orderBy('created_at','desc')->take(7)->get();
		$technology_big=technology::where('id','>',0)->where('technology_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($technology_big)){$id=$technology_big->id;} else{$id=0;}// get id for avoid repeatation post 
		$technology_news=technology::where('id','!=',$id)->where('technology_status',1)->get();// take value of technology post 
	 // id the count is over 8 then get data 8 posts otherwise take all data how much we post 
		return view('front.wontechnology',compact('technology_slide','technology_big','technology_news'));	
	}
}
