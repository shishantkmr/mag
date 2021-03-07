<?php

namespace App\Http\Controllers\admin\visa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\visa\TravelVisa;
use DB;
use File;

class TravelController extends Controller
{
      public function view_travel()
	{
		$edit_travel= TravelVisa::where('id','>',0)->orderBy('id', 'Desc')->first();
		// if($edit_travel=='')
		// 	{ echo "no data";	return view('back.create_travel');}
		// // echo json_encode($edit_travel);
		// return view('back.create_travel',compact('edit_travel'));
		// $get=TravelVisa::where('id','>',0)->first();
		
		// return view('back.create_travel')->with('edit_travel',$edit_travel);
	return view('back.create_travel',compact('edit_travel'));
	}
	public function create_travel(Request $request)
	{
		if($request->has('travel_status')){$status=1;}else{$status=0;}
		if($request->has('travel_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('travel_img')){      
			$file=$request->file('travel_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/travel/', $fileName);      
		}  
		else{$fileName = 'noimage.jpg';}
		$create_travel= new TravelVisa;
		$create_travel->travel_title=$request->travel_title;
		$create_travel->travel_text=$request->travel_text;
		$create_travel->travel_img=$fileName;
		$create_travel->travel_url=$request->travel_url;
		$create_travel->travel_slug=$request->travel_slug;
		$create_travel->travel_tag=$request->travel_tag;
		$create_travel->travel_status=$status;
		$create_travel->travel_future_post=$request->travel_future_post;
		$create_travel->travel_popular=$popular;
		$create_travel->save();
		
// error from future post, 
		
		return back()->with('message_cr','Your Post Created');
	}
	public function listed_travel()
	{
		$listed_travel=TravelVisa::where('deleted_at')->orderBy('id','Desc')->get();
		$listed_travel_count=DB::table('travel_visas')->whereNotNull('deleted_at')->count();
		// dd($listed_travel_count);die;
		return view('back.listed_travel',compact('listed_travel','listed_travel_count'));
	}
	public function edit_travel($id)
	{
		$edit_travel=TravelVisa::findorFail($id);
		return view('back.edit_travel',compact('edit_travel'));
	}
	public function update_travel(Request $request,$id)
	{
		if($request->has('travel_status')){$status=1;}else{$status=0;}
		if($request->has('travel_popular')){$popular=1;}else{$popular=0;}
		$update_travel=  TravelVisa::findorFail($id);
		$link =$update_travel->travel_img;
		if($request->hasfile('travel_img')){      
			$file=$request->file('travel_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/travel/', $fileName);     
			File::delete('image/admin/travel/'.$link); 
		}  
		else{$fileName = $update_travel->travel_img;}

		// if(File::exists($fileName)){dd('exists');die;}else{dd('not');die;}
		$update_travel->travel_title=$request->travel_title;
		$update_travel->travel_text=$request->travel_text;
		$update_travel->travel_img=$fileName;
		$update_travel->travel_url=$request->travel_url;
		$update_travel->travel_slug=$request->travel_slug;
		$update_travel->travel_tag=$request->travel_tag;
		$update_travel->travel_status=$status;
		$update_travel->travel_future_post=$request->travel_future_post;
		$update_travel->travel_popular=$popular;
		$update_travel->update();
		return back()->with('message_up','Post Updated');
	}
	public function delete_travel($id)
	{
		$delete_travel=TravelVisa::findorFail($id);
		$delete_travel->delete();
		return Redirect()->route('admin/listed_travel')->with('message_ds','Your Post Has Been Deleted');
	}


	// Ajax for travel
	public function get_travel()
	{
		$edit_travel= TravelVisa::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_travel);
		
	} 
	}
