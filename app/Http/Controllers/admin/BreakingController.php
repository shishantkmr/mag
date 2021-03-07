<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\BreakingNews;
use DB;
use File;

class BreakingController extends Controller
{
    //
	public function breakingnews_news()
	{
		$edit_breakingnews= breakingnews::where('id','>',0)->orderBy('id', 'Desc')->first();
		// echo json_encode($edit_breakingnews);
		// return view('back.create_breakingnews',compact('edit_breakingnews'));
		// $get=breakingnews::where('id','>',0)->first();

		// return view('back.create_breakingnews')->with('edit_breakingnews',$edit_breakingnews);
		return view('back.create_breakingnews',compact('edit_breakingnews'));
	}
	public function create_breakingnews(Request $request)
	{
		if($request->has('breakingnews_status')){$status=1;}else{$status=0;}
		if($request->has('breakingnews_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('breakingnews_img')){      
			$file=$request->file('breakingnews_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/breakingnews/', $fileName);      
		}  
		else{$fileName = 'noimage.jpg';}
		$create_breakingnews= new breakingnews;
		$create_breakingnews->breakingnews_title=$request->breakingnews_title;
		$create_breakingnews->breakingnews_text=$request->breakingnews_text;
		$create_breakingnews->breakingnews_img=$fileName;
		$create_breakingnews->breakingnews_url=$request->breakingnews_url;
		$create_breakingnews->breakingnews_slug=$request->breakingnews_slug;
		$create_breakingnews->breakingnews_tag=$request->breakingnews_tag;
		$create_breakingnews->breakingnews_status=$status;
		$create_breakingnews->breakingnews_future_post=$request->breakingnews_future_post;
		$create_breakingnews->breakingnews_popular=$popular;
		$create_breakingnews->save();
		
// error from future post, 
		
		return back()->with('message_cr','Your Post Created');
	}
	public function listed_breakingnews()
	{
		$listed_breakingnews=breakingnews::where('deleted_at')->orderBy('id','Desc')->get();
		$listed_breakingnews_count=DB::table('breaking_news')->whereNotNull('deleted_at')->count();
		// dd($listed_breakingnews_count);die;
		return view('back.listed_breakingnews',compact('listed_breakingnews','listed_breakingnews_count'));
	}
	public function edit_breakingnews($id)
	{
		$edit_breakingnews=breakingnews::findorFail($id);
		return view('back.edit_breakingnews',compact('edit_breakingnews'));
	}
	public function update_breakingnews(Request $request,$id)
	{
		if($request->has('breakingnews_status')){$status=1;}else{$status=0;}
		if($request->has('breakingnews_popular')){$popular=1;}else{$popular=0;}
		$update_breakingnews=  breakingnews::findorFail($id);
		if($request->hasfile('breakingnews_img')){      
			$file=$request->file('breakingnews_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/breakingnews/', $fileName); 
			File::Delete('image/admin/breakingnews/'.$update_breakingnews->breakingnews_img);
		}  
		else{$fileName = $update_breakingnews->breakingnews_img;}
		
		$update_breakingnews->breakingnews_title=$request->breakingnews_title;
		$update_breakingnews->breakingnews_text=$request->breakingnews_text;
		$update_breakingnews->breakingnews_img=$fileName;
		$update_breakingnews->breakingnews_url=$request->breakingnews_url;
		$update_breakingnews->breakingnews_slug=$request->breakingnews_slug;
		$update_breakingnews->breakingnews_tag=$request->breakingnews_tag;
		$update_breakingnews->breakingnews_status=$status;
		$update_breakingnews->breakingnews_future_post=$request->breakingnews_future_post;
		$update_breakingnews->breakingnews_popular=$popular;
		$update_breakingnews->update();
		return back()->with('message_up','Post Updated');
	}
	public function delete_breakingnews($id)
	{
		$delete_breakingnews=breakingnews::findorFail($id);
		$delete_breakingnews->delete();
		return Redirect()->route('admin/listed_breakingnews')->with('message_ds','Your Post Has Been Deleted');
	}


	// Ajax for breakingnews
	public function get_breakingnews()
	{
		$edit_breakingnews= breakingnews::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_breakingnews);
		
	} 
	public function get_breakingnews_edit()
	{
		$edit_breakingnews= breakingnews::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_breakingnews);
		
	} 
}
