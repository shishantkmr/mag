<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Models\admin\SlidePage;
use App\Models\admin\Slide;
use DB;
use File;

class SlidepagesController extends Controller
{
	public function slidepage_news()
	{
		$edit_slidepage= slidepage::where('id','>',0)->orderBy('id', 'Desc')->first();
		$slide=Slide::all();
		
		// foreach ($slide as $key ) {
		// 	# code...
		// dd($key);die;
		// }
	

		// echo json_encode($edit_slidepage);
		// return view('back.create_slidepage',compact('edit_slidepage'));
		// $get=slidepage::where('id','>',0)->first();

		// return view('back.create_slidepage')->with('edit_slidepage',$edit_slidepage);
		return view('back.create_slidepage',compact('edit_slidepage','slide'));
	}
	public function create_slidepage(Request $request)
	{
		$slide=$request->slide;	
		if($request->has('slidepage_status')){$status=1;}else{$status=0;}
		if($request->has('slidepage_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('slidepage_img1')){      
			$file1=$request->file('slidepage_img1');
			$fileName1 =time().'_'.$file1->getClientOriginalName();
			$file1->move('image/admin/slidepage/', $fileName1);      
		}
		// if ($request->hasfile('slidepage_img2')){      
		// 	$file2=$request->file('slidepage_img2');
		// 	$fileName2 =time().'_'.$file2->getClientOriginalName();
		// 	$file2->move('image/admin/slidepage/', $fileName2);      
		// } if ($request->hasfile('slidepage_img3')){      
		// 	$file3=$request->file('slidepage_img3');
		// 	$fileName3 =time().'_'.$file3->getClientOriginalName();
		// 	$file3->move('image/admin/slidepage/', $fileName3);      
		// } if ($request->hasfile('slidepage_img4')){      
		// 	$file4=$request->file('slidepage_img4');
		// 	$fileName4 =time().'_'.$file4->getClientOriginalName();
		// 	$file4->move('image/admin/slidepage/', $fileName4);      
		// } 
		else{$fileName1 = 'noimage.jpg';}
		$create_slidepage= new slidepage;
		$create_slidepage->slidepage_title=$request->slidepage_title;
		$create_slidepage->slide_id=$slide;
		$create_slidepage->slidepage_text=$request->slidepage_text;
		$create_slidepage->slidepage_news=$request->slidepage_news;
		$create_slidepage->slidepage_img1=$fileName1;
		// $create_slidepage->slidepage_img2=$fileName2;
		// $create_slidepage->slidepage_img3=$fileName3;
		// $create_slidepage->slidepage_img4=$fileName4;
		$create_slidepage->slidepage_url=$request->slidepage_url;
		$create_slidepage->slidepage_slug=$request->slidepage_slug;
		$create_slidepage->slidepage_tag=$request->slidepage_tag;
		$create_slidepage->slidepage_status=$status;
		$create_slidepage->slidepage_future_post=$request->slidepage_future_post;
		$create_slidepage->slidepage_popular=$popular;
		$create_slidepage->save();
		
// error from future post, 
		
		return back()->with('message_cr','Your Post Created');
	}
	public function listed_slidepage()
	{
		$listed_slidepage=slidepage::where('deleted_at')->orderBy('id','Desc')->get();
		$listed_slidepage_count=DB::table('slide_pages')->whereNotNull('deleted_at')->count();
		// dd($listed_slidepage_count);die;
		return view('back.listed_slidepage',compact('listed_slidepage','listed_slidepage_count'));
	}
	public function edit_slidepage($id)
	{
		$edit_slidepage=slidepage::findorFail($id);
		return view('back.edit_slidepage',compact('edit_slidepage'));
	}
	public function update_slidepage(Request $request,$id)
	{
		$update_slidepage=  slidepage::findorFail($id);
		if($request->has('slidepage_status')){$status=1;}else{$status=0;}
		if($request->has('slidepage_popular')){$popular=1;}else{$popular=0;}
		if($request->hasfile('slidepage_img1')){      
			$file1=$request->file('slidepage_img1');
			$fileName1 =time().'_'.$file1->getClientOriginalName();
			$file1->move('image/admin/slidepage/', $fileName1); 
			File::Delete('image/admin/slidepage/'.$update_slidepage->slidepage_img1);     
		}
		// if ($request->hasfile('slidepage_img2')){      
		// 	$file2=$request->file('slidepage_img2');
		// 	$fileName2 =time().'_'.$file2->getClientOriginalName();
		// 	$file2->move('image/admin/slidepage/', $fileName2);      
		// } 
		// if ($request->hasfile('slidepage_img3')){      
		// 	$file3=$request->file('slidepage_img3');
		// 	$fileName3 =time().'_'.$file3->getClientOriginalName();
		// 	$file3->move('image/admin/slidepage/', $fileName3);      
		// } 
		// if ($request->hasfile('slidepage_img4')){      
		// 	$file4=$request->file('slidepage_img4');
		// 	$fileName4 =time().'_'.$file4->getClientOriginalName();
		// 	$file4->move('image/admin/slidepage/', $fileName4);      
		// } 

		// else{$fileName1=$update_slidepage->slidepage_img1;$fileName2=$update_slidepage->slidepage_img2;$fileName3=$update_slidepage->slidepage_img3;$fileName4=$update_slidepage->slidepage_img4;}
		else{$fileName1=$update_slidepage->slidepage_img1;}
		// $update_slidepage->slidepage_img2=$fileName2;
		// $update_slidepage->slidepage_img3=$fileName3;
		// $update_slidepage->slidepage_img4=$fileName4;
		$update_slidepage->slidepage_url=$request->slidepage_url;
		$update_slidepage->slidepage_slug=$request->slidepage_slug;
		$update_slidepage->slidepage_text=$request->slidepage_text;
		$update_slidepage->slidepage_news=$request->slidepage_news;
		$update_slidepage->slidepage_tag=$request->slidepage_tag;
		$update_slidepage->slidepage_status=$status;
		$update_slidepage->slidepage_future_post=$request->slidepage_future_post;
		$update_slidepage->slidepage_popular=$popular;
		$update_slidepage->update();
		return back()->with('message_up','Post Updated');
	}
	public function delete_slidepage($id)
	{
		$delete_slidepage=slidepage::findorFail($id);
		$delete_slidepage->delete();
		return Redirect()->route('admin/listed_slidepage')->with('message_ds','Your Post Has Been Deleted');
	}


	// Ajax for slidepage
	public function get_slidepage()
	{
		$edit_slidepage= slidepage::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_slidepage);
		
	} 
	public function get_slidepage_edit()
	{
		$edit_slidepage= slidepage::where('id','>',0)->orderBy('id', 'Desc')->first();
		return json_encode($edit_slidepage);
		
	} 
}
