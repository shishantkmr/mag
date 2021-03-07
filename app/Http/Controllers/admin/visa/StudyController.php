<?php

namespace App\Http\Controllers\admin\visa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\visa\StudyVisa;
use File;
use Response;
use DB;

class StudyController extends Controller
{
  public function view_study()
	{
		$edit_study= StudyVisa::where('id','>',0)->orderBy('id', 'Desc')->first();
		// echo json_encode($edit_study);
		// return view('back.create_study',compact('edit_study'));
		// $get=studyVisa::where('id','>',0)->first();

		// return view('back.create_study')->with('edit_study',$edit_study);
		return view('back.create_study',compact('edit_study'));
	}
	public function create_study(Request $request)
	{
		if($request->has('study_status')){$status=1;}else{$status=0;}
		if($request->has('study_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('study_img')){      
			$file=$request->file('study_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/study/', $fileName);      
		}  
		else{$fileName = 'noimage.jpg';}
		$create_study= new StudyVisa;
		$create_study->study_title=$request->study_title;
		$create_study->study_text=$request->study_text;
		$create_study->study_img=$fileName;
		$create_study->study_url=$request->study_url;
		$create_study->study_slug=$request->study_slug;
		$create_study->study_tag=$request->study_tag;
		$create_study->study_status=$status;
		$create_study->study_future_post=$request->study_future_post;
		$create_study->study_popular=$popular;
		$create_study->save();
		
// error from future post, 
		
		return back()->with('message_cr','Your Post Created');
	}
	// listed
	public function listed_study()
	{
		$listed_study=StudyVisa::where('deleted_at')->orderBy('id','Desc')->get();
		$listed_study_count=DB::table('studies')->whereNotNull('deleted_at')->count();
		// dd($listed_study_count);die;
		return view('back.listed_study',compact('listed_study','listed_study_count'));
	}
	public function edit_study($id)
	{
		$edit_study=StudyVisa::findorFail($id);
		return view('back.edit_study',compact('edit_study'));
	}

	public function update_study(Request $request,$id)
	{
		if($request->has('study_status')){$status=1;}else{$status=0;}
		if($request->has('study_popular')){$popular=1;}else{$popular=0;}
		$update_study=  StudyVisa::findorFail($id);
		if($request->hasfile('study_img')){      
			$file=$request->file('study_img');
			$fileName =time().'_'.$file->getClientOriginalName();
			$file->move('image/admin/study/', $fileName); 
			File::Delete('image/admin/study/'.$update_study->study_img); // Delete img if exists on folder    
		}  
		else{$fileName = $update_study->study_img;}
		
		$update_study->study_title=$request->study_title;
		$update_study->study_text=$request->study_text;
		$update_study->study_img=$fileName;
		$update_study->study_url=$request->study_url;
		$update_study->study_slug=$request->study_slug;
		$update_study->study_tag=$request->study_tag;
		$update_study->study_status=$status;
		$update_study->study_future_post=$request->study_future_post;
		$update_study->study_popular=$popular;
		$update_study->update();
		return back()->with('message_up','Post Updated');
	}

public function delete_study($id)
	{
		$delete_study=StudyVisa::findorFail($id);
		$delete_study->delete();
		return Redirect()->route('admin/listed_study')->with('message_ds','Your Post Has Been Deleted');
	}



	// Ajax for study
	public function get_study()
	{
		$edit_study= StudyVisa::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_study);
		
	} 
}
