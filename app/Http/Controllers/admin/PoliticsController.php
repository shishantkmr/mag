<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Politics;
use DB;
use File;
class PoliticsController extends Controller
{

	public function politics_news()
	{
		$edit_politics= Politics::where('id','>',0)->orderBy('id', 'Desc')->first();
		// echo json_encode($edit_politics);
		// return view('back.create_politics',compact('edit_politics'));
		// $get=Politics::where('id','>',0)->first();

		// return view('back.create_politics')->with('edit_politics',$edit_politics);
		return view('back.create_politics',compact('edit_politics'));
	}
	public function create_politics(Request $request)
	{
		if($request->has('politics_status')){$status=1;}else{$status=0;}
		if($request->has('politics_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('politics_img')){      
			$file=$request->file('politics_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/politics/', $fileName);      
		}  
		else{$fileName = 'noimage.jpg';}
		$create_politics= new Politics;
		$create_politics->politics_title=$request->politics_title;
		$create_politics->politics_text=$request->politics_text;
		$create_politics->politics_img=$fileName;
		$create_politics->politics_url=$request->politics_url;
		$create_politics->politics_slug=$request->politics_slug;
		$create_politics->politics_tag=$request->politics_tag;
		$create_politics->politics_status=$status;
		$create_politics->politics_future_post=$request->politics_future_post;
		$create_politics->politics_popular=$popular;
		$create_politics->save();
		
// error from future post, 
		
		return back()->with('message_cr','Your Post Created');
	}
	public function listed_politics()
	{
		$listed_politics=Politics::where('deleted_at')->orderBy('id','Desc')->get();
		$listed_politics_count=DB::table('politics')->whereNotNull('deleted_at')->count();
		// dd($listed_politics_count);die;
		return view('back.listed_politics',compact('listed_politics','listed_politics_count'));
	}
	public function edit_politics($id)
	{
		$edit_politics=Politics::findorFail($id);
		return view('back.edit_politics',compact('edit_politics'));
	}
	public function update_politics(Request $request,$id)
	{
		if($request->has('politics_status')){$status=1;}else{$status=0;}
		if($request->has('politics_popular')){$popular=1;}else{$popular=0;}
		$update_politics=  Politics::findorFail($id);
		if($request->hasfile('politics_img')){      
			$file=$request->file('politics_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/politics/', $fileName);  
			File::Delete('image/admin/politics/'.$update_politics->politics_img);    
		}  
		else{$fileName = $update_politics->politics_img;}
		
		$update_politics->politics_title=$request->politics_title;
		$update_politics->politics_text=$request->politics_text;
		$update_politics->politics_img=$fileName;
		$update_politics->politics_url=$request->politics_url;
		$update_politics->politics_slug=$request->politics_slug;
		$update_politics->politics_tag=$request->politics_tag;
		$update_politics->politics_status=$status;
		$update_politics->politics_future_post=$request->politics_future_post;
		$update_politics->politics_popular=$popular;
		$update_politics->update();
		return back()->with('message_up','Post Updated');
	}
	public function delete_politics($id)
	{
		$delete_politics=Politics::findorFail($id);
		$delete_politics->delete();
		return Redirect()->route('admin/listed_politics')->with('message_ds','Your Post Has Been Deleted');
	}


	// Ajax for politics
	public function get_politics()
	{
		$edit_politics= Politics::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_politics);
		
	} 
	public function get_politics_edit()
	{
		$edit_politics= Politics::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_politics);
		
	} 
	public function wonpolitics()
	{
		$politics_slide=Politics::where('politics_status',1)->orderBy('created_at','desc')->take(7)->get();
		$politics_big=politics::where('id','>',0)->where('politics_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($politics_big)){$id=$politics_big->id;} else{$id=0;}// get id for avoid repeatation post 
		$politics_news=politics::where('id','!=',$id)->where('politics_status',1)->get();// take value of politics post 
	 // id the count is over 8 then get data 8 posts otherwise take all data how much we post 
		return view('front.wonpolitics',compact('politics_slide','politics_big','politics_news'));	
	}
	
}


