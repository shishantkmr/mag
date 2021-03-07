<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use DB;
use Response;
use File;
// models
use App\Models\admin\visa\WorkVisa;
use App\Models\admin\visa\StudyVisa;
use App\Models\admin\visa\TravelVisa;
use App\Models\admin\Festival;
use App\Models\admin\Fashion;
use App\Models\admin\SlidePage;
use App\Models\admin\Politics;
use App\Models\admin\Technology;
use App\Models\admin\BreakingNews;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }


    public function removed_post()
    {
      $removed_breakingnews=BreakingNews::onlyTrashed()->paginate(3);
      $removed_visa=WorkVisa::onlyTrashed()->paginate(3);
      $removed_study=StudyVisa::onlyTrashed()->paginate(3);
      $removed_travel=TravelVisa::onlyTrashed()->paginate(3);
        // dd($removed_visa->count());die;
      $removed_fashion=Fashion::onlyTrashed()->paginate(3);
      $removed_festival=Festival::onlyTrashed()->paginate(3);
      $removed_slidepage=SlidePage::onlyTrashed()->paginate(3);
      $removed_politics=Politics::onlyTrashed()->paginate(3);
      $removed_technology=Technology::onlyTrashed()->paginate(3);
        // dd($removed_fashion[0]);die;
      return view('back.removedpost',compact('removed_breakingnews','removed_visa','removed_study','removed_travel','removed_fashion','removed_festival','removed_slidepage','removed_politics','removed_technology'));
    }
    public function restore_visa($id)
    {

     $restore_visa=WorkVisa::withTrashed()->findorFail($id);
       // dd($restore_visa);die;
     $restore_visa->restore();
     return  back()->with('message_dr','Post Restored');
   }
   public function erase_visa($id)
   {
    $erase_visa =WorkVisa::withTrashed()->find($id);
    $img_path='image/admin/visa/'.$erase_visa->visa_img;
    File::Delete($img_path);
    $erase_visa->forceDelete();
    return back()->with('message_dp','Pemanently deleted post');
  }

  public function restore_fashion($id)
  {

   $restore_fashion=fashion::withTrashed()->findorFail($id);
           // dd($restore_fashion);die;
   $restore_fashion->restore();
   return  back()->with('message_dr','Post Restored');
 }
 public function erase_fashion($id)
 {
  $erase_fashion =fashion::withTrashed()->find($id);
  $img_path='image/admin/fashion/'.$erase_fashion->fashion_img;
  File::Delete($img_path);
  $erase_fashion->forceDelete();
  return back()->with('message_dp','Pemanently deleted post');
}
public function restore_festival($id)
{

 $restore_festival=festival::withTrashed()->findorFail($id);
       // dd($restore_festival);die;
 $restore_festival->restore();
 return  back()->with('message_dr','Post Restored');
}
public function erase_festival($id)
{
  $erase_festival =festival::withTrashed()->find($id);
  $img_path= 'image/admin/festival/'.$erase_festival->festival_img;
  File::Delete($img_path);
  $erase_festival->forceDelete();
  return back()->with('message_dp','Pemanently deleted post');
}
public function restore_study($id)
{

 $restore_study=StudyVisa::withTrashed()->findorFail($id);
       // dd($restore_study);die;
 $restore_study->restore();
 return  back()->with('message_dr','Post Restored');
}
public function erase_study($id)
{
  $erase_study =StudyVisa::withTrashed()->find($id);
  $img_path='image/admin/study/'.$erase_study->study_img;
  File::Delete($img_path);
  $erase_study->forceDelete();
  return back()->with('message_dp','Pemanently deleted post');
}
public function restore_slidepage($id)
{

 $restore_slidepage=slidepage::withTrashed()->findorFail($id);
       // dd($restore_slidepage);die;
 $restore_slidepage->restore();
 return  back()->with('message_dr','Post Restored');
}
public function erase_slidepage($id)
{
  $erase_slidepage =slidepage::withTrashed()->find($id);
  $img_path= 'image/admin/slidepage/'.$erase_slidepage->slidepage_img1;
  // dd($img_path);die;
  File::Delete($img_path);
  $erase_slidepage->forceDelete();
  return back()->with('message_dp','Pemanently deleted post');
}

public function restore_politics($id)
{

 $restore_politics=Politics::withTrashed()->findorFail($id);
       // dd($restore_visa);die;
 $restore_politics->restore();
 return  back()->with('message_dr','Post Restored');
}
public function erase_politics($id)
{
 $erase_politics =Politics::withTrashed()->find($id);
 $img_path = 'image/admin/politics/'.$erase_politics->politics_img;
 File::Delete($img_path);
 $erase_politics->forceDelete();
 return back()->with('message_dp','Pemanently deleted post');
}



public function restore_travel($id)
{

 $restore_travel=TravelVisa::withTrashed()->findorFail($id);
       // dd($restore_visa);die;
 $restore_travel->restore();
 return  back()->with('message_dr','Post Restored');
}
public function erase_travel($id)

{
  $erase_travel =TravelVisa::withTrashed()->find($id);
  $img_path='image/admin/travel/'.$erase_travel->travel_img;
  if($img_path){
    // dd($img_path);die;
    File::delete($img_path);
  }
  $erase_travel->forceDelete();
  return back()->with('message_dp','Pemanently deleted post');

}

public function restore_breakingnews($id)
{

 $restore_breakingnews=breakingnews::withTrashed()->findorFail($id);
       // dd($restore_visa);die;
 $restore_breakingnews->restore();
 return  back()->with('message_dr','Post Restored');
}
public function erase_breakingnews($id)

{
  $erase_breakingnews =breakingnews::withTrashed()->find($id);
  $img_path='image/admin/breakingnews/'.$erase_breakingnews->breakingnews_img;
  if($img_path){
    // dd($img_path);die;
    File::delete($img_path);
  }
  $erase_breakingnews->forceDelete();
  return back()->with('message_dp','Pemanently deleted post');
  
}

public function restore_technology($id)
{

 $restore_technology=technology::withTrashed()->findorFail($id);
       // dd($restore_visa);die;
 $restore_technology->restore();
 return  back()->with('message_dr','Post Restored');
}
public function erase_technology($id)

{
  $erase_technology =technology::withTrashed()->find($id);
  $img_path='image/admin/technology/'.$erase_technology->technology_img;
  if($img_path){
    // dd($img_path);die;
    File::delete($img_path);
  }
  $erase_technology->forceDelete();
  return back()->with('message_dp','Pemanently deleted post');
  
}




public function indexpage_show()
{
  return view('front.index');
}
public function singlepage_show()
{
  return view('front.single');
}
public function admin()
{
  return view('back.index');
}
public function index()
{
  return view('home');
}

}
