<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Festival;
use DB;
use File;
class FestivalController extends Controller
{
	public function view_festival()
	{
		$edit_festival= Festival::where('id','>',0)->orderBy('id', 'Desc')->first();
		// echo json_encode($edit_festival);
		// return view('back.create_festival',compact('edit_festival'));
		// $get=festival::where('id','>',0)->first();

		// return view('back.create_festival')->with('edit_festival',$edit_festival);
		return view('back.create_festival',compact('edit_festival'));
	}
	public function create_festival(Request $request)
	{
		if($request->has('festival_status')){$status=1;}else{$status=0;}
		if($request->has('festival_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('festival_img')){      
			$file=$request->file('festival_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/festival/', $fileName);      
		}  
		else{$fileName = 'noimage.jpg';}
		$create_festival= new festival;
		$create_festival->festival_title=$request->festival_title;
		$create_festival->festival_text=$request->festival_text;
		$create_festival->festival_img=$fileName;
		$create_festival->festival_url=$request->festival_url;
		$create_festival->festival_slug=$request->festival_slug;
		$create_festival->festival_tag=$request->festival_tag;
		$create_festival->festival_status=$status;
		$create_festival->festival_future_post=$request->festival_future_post;
		$create_festival->festival_popular=$popular;
		$create_festival->save();
		return back()->with('message_cr','Your Post Created');
	}

	public function listed_festival()
	{
		$listed_festival=Festival::where('deleted_at')->orderBy('id','Desc')->get();
		$listed_festival_count=DB::table('festivals')->whereNotNull('deleted_at')->count();
		// dd($listed_festival_count);die;
		return view('back.listed_festival',compact('listed_festival','listed_festival_count'));
	}
	public function edit_festival($id)
	{
		$edit_festival=festival::findorFail($id);
		return view('back.edit_festival',compact('edit_festival'));
	}
	public function update_festival(Request $request,$id)
	{
		if($request->has('festival_status')){$status=1;}else{$status=0;}
		if($request->has('festival_popular')){$popular=1;}else{$popular=0;}
		$update_festival=  festival::findorFail($id);
		if($request->hasfile('festival_img')){      
			$file=$request->file('festival_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/festival/', $fileName); 
			File::Delete('image/admin/festival/'.$update_festival->festival_img);
		}  
		else{$fileName = $update_festival->festival_img;}
		
		$update_festival->festival_title=$request->festival_title;
		$update_festival->festival_text=$request->festival_text;
		$update_festival->festival_img=$fileName;
		$update_festival->festival_url=$request->festival_url;
		$update_festival->festival_slug=$request->festival_slug;
		$update_festival->festival_tag=$request->festival_tag;
		$update_festival->festival_status=$status;
		$update_festival->festival_future_post=$request->festival_future_post;
		$update_festival->festival_popular=$popular;
		$update_festival->update();
		return back()->with('message_up','Post Updated');
	}
	public function delete_festival($id)
	{
		$delete_festival=festival::findorFail($id);
		$delete_festival->delete();
		return Redirect()->route('admin/listed_festival')->with('message_ds','Your Post Has Been Deleted');
	}


	// Ajax for festival
	public function get_festival()
	{
		$edit_festival= festival::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_festival);
		
	} 
	public function get_festival_edit()
	{
		$edit_festival= festival::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_festival);
		
	} 
	public function wonfestival()
	{
		$festival_slide=festival::where('festival_status',1)->orderBy('created_at','desc')->take(7)->get();
		$festival_big=festival::where('id','>',0)->where('festival_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($festival_big)){$id=$festival_big->id;} else{$id=0;}// get id for avoid repeatation post 
		$festival_news=festival::where('id','!=',$id)->where('festival_status',1)->get();// take value of festival post 
	 // id the count is over 8 then get data 8 posts otherwise take all data how much we post 
		return view('front.wonfestival',compact('festival_slide','festival_big','festival_news'));	
	}
}
