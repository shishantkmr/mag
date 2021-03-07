<?php

namespace App\Http\Controllers\admin\visa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\visa\WorkVisa;
use DB;
use File;
class WorkController extends Controller
{
  public function visa_news()
	{
		$edit_visa= WorkVisa::where('id','>',0)->orderBy('id', 'Desc')->first();
		// echo json_encode($edit_visa);
		// return view('back.create_visa',compact('edit_visa'));
		// $get=WorkVisa::where('id','>',0)->first();

		// return view('back.create_visa')->with('edit_visa',$edit_visa);
		return view('back.create_visa',compact('edit_visa'));
	}
	public function create_visa(Request $request)
	{
		if($request->has('visa_status')){$status=1;}else{$status=0;}
		if($request->has('visa_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('visa_img')){      
			$file=$request->file('visa_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/visa/', $fileName);      
		}  
		else{$fileName = 'noimage.jpg';}
		$create_visa= new WorkVisa;
		$create_visa->visa_title=$request->visa_title;
		$create_visa->visa_text=$request->visa_text;
		$create_visa->visa_img=$fileName;
		$create_visa->visa_url=$request->visa_url;
		$create_visa->visa_slug=$request->visa_slug;
		$create_visa->visa_tag=$request->visa_tag;
		$create_visa->visa_status=$status;
		$create_visa->visa_future_post=$request->visa_future_post;
		$create_visa->visa_popular=$popular;
		$create_visa->save();
		
// error from future post, 
		
		return back()->with('message_cr','Your Post Created');
	}
	public function listed_visa()
	{
		$listed_visa=WorkVisa::where('deleted_at')->orderBy('id','Desc')->get();
		$listed_visa_count=DB::table('work_visas')->whereNotNull('deleted_at')->count();
		// dd($listed_visa_count);die;
		return view('back.listed_visa',compact('listed_visa','listed_visa_count'));
	}
	public function edit_visa($id)
	{
		$edit_visa=WorkVisa::findorFail($id);
		return view('back.edit_visa',compact('edit_visa'));
	}
	public function update_visa(Request $request,$id)
	{
		if($request->has('visa_status')){$status=1;}else{$status=0;}
		if($request->has('visa_popular')){$popular=1;}else{$popular=0;}
		$update_visa=  WorkVisa::findorFail($id);
		if($request->hasfile('visa_img')){      
			$file=$request->file('visa_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/visa/', $fileName);    
			File::Delete('image/admin/visa/'.$update_visa->visa_img);  
		}  
		else{$fileName = $update_visa->visa_img;}
		
		$update_visa->visa_title=$request->visa_title;
		$update_visa->visa_text=$request->visa_text;
		$update_visa->visa_img=$fileName;
		$update_visa->visa_url=$request->visa_url;
		$update_visa->visa_slug=$request->visa_slug;
		$update_visa->visa_tag=$request->visa_tag;
		$update_visa->visa_status=$status;
		$update_visa->visa_future_post=$request->visa_future_post;
		$update_visa->visa_popular=$popular;
		$update_visa->update();
		return back()->with('message_up','Post Updated');
	}
	public function delete_visa($id)
	{
		$delete_visa=WorkVisa::findorFail($id);
		$delete_visa->delete();
		return Redirect()->route('admin/listed_visa')->with('message_ds','Your Post Has Been Deleted');
	}


	// Ajax for visa
	public function get_visa()
	{
		$edit_visa= WorkVisa::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_visa);
		
	} 
	public function get_visa_edit()
	{
		$edit_visa= WorkVisa::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_visa);
		
	} 
	
}
