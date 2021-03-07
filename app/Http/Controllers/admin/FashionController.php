<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Fashion;
use DB;
use File;
class FashionController extends Controller
{
  public function view_fashion()
	{
		$edit_fashion= Fashion::where('id','>',0)->orderBy('id', 'Desc')->first();
		// if($edit_fashion=='')
		// 	{ echo "no data";	return view('back.create_fashion');}
		// // echo json_encode($edit_fashion);
		// return view('back.create_fashion',compact('edit_fashion'));
		// $get=fashion::where('id','>',0)->first();
		
		// return view('back.create_fashion')->with('edit_fashion',$edit_fashion);
	return view('back.create_fashion',compact('edit_fashion'));
	}
	public function create_fashion(Request $request)
	{
		if($request->has('fashion_status')){$status=1;}else{$status=0;}
		if($request->has('fashion_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('fashion_img')){      
			$file=$request->file('fashion_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/fashion/', $fileName);      
		}  
		else{$fileName = 'noimage.jpg';}
		$create_fashion= new fashion;
		$create_fashion->fashion_title=$request->fashion_title;
		$create_fashion->fashion_text=$request->fashion_text;
		$create_fashion->fashion_img=$fileName;
		$create_fashion->fashion_url=$request->fashion_url;
		$create_fashion->fashion_slug=$request->fashion_slug;
		$create_fashion->fashion_tag=$request->fashion_tag;
		$create_fashion->fashion_status=$status;
		$create_fashion->fashion_future_post=$request->fashion_future_post;
		$create_fashion->fashion_popular=$popular;
		$create_fashion->save();
		
// error from future post, 
		
		return back()->with('message_cr','Your Post Created');
	}
	public function listed_fashion()
	{
		$listed_fashion=fashion::where('deleted_at')->orderBy('id','Desc')->get();
		$listed_fashion_count=DB::table('fashions')->whereNotNull('deleted_at')->count();
		// dd($listed_fashion_count);die;
		return view('back.listed_fashion',compact('listed_fashion','listed_fashion_count'));
	}
	public function edit_fashion($id)
	{
		$edit_fashion=fashion::findorFail($id);
		return view('back.edit_fashion',compact('edit_fashion'));
	}
	public function update_fashion(Request $request,$id)
	{
		if($request->has('fashion_status')){$status=1;}else{$status=0;}
		if($request->has('fashion_popular')){$popular=1;}else{$popular=0;}
		$update_fashion=  fashion::findorFail($id);
		if($request->hasfile('fashion_img')){      
			$file=$request->file('fashion_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/fashion/', $fileName);  
			File::Delete('image/admin/fashion/'.$update_fashion->fashion_img);    
		}  
		else{$fileName = $update_fashion->fashion_img;}
		
		$update_fashion->fashion_title=$request->fashion_title;
		$update_fashion->fashion_text=$request->fashion_text;
		$update_fashion->fashion_img=$fileName;
		$update_fashion->fashion_url=$request->fashion_url;
		$update_fashion->fashion_slug=$request->fashion_slug;
		$update_fashion->fashion_tag=$request->fashion_tag;
		$update_fashion->fashion_status=$status;
		$update_fashion->fashion_future_post=$request->fashion_future_post;
		$update_fashion->fashion_popular=$popular;
		$update_fashion->update();
		return back()->with('message_up','Post Updated');
	}
	public function delete_fashion($id)
	{
		$delete_fashion=fashion::findorFail($id);
		$delete_fashion->delete();
		return Redirect()->route('admin/listed_fashion')->with('message_ds','Your Post Has Been Deleted');
	}


	// Ajax for fashion
	public function get_fashion()
	{
		$edit_fashion= fashion::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_fashion);
		
	} 
	public function get_fashion_edit()
	{
		$edit_fashion= fashion::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_fashion);
		
	} 
	
}
