<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\visa\WorkVisa;
use App\Models\admin\visa\StudyVisa;
use App\Models\admin\visa\TravelVisa;
use App\Models\admin\Festival;
use App\Models\admin\Fashion;
use App\Models\admin\SlidePage;
use App\Models\admin\BreakingNews;
use App\Models\admin\Politics;
use App\Models\admin\Slide;
use App\Models\admin\Technology;
use App\Models\front\Guest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class NewsController extends Controller
{
	public function index(Request $request)
	{
		// include_path'App\resources\views\front\test.php';


		// $sliden=SlidePage::where('slidepage_status',1)->get();
		// $sliden_count=$sliden->count();
		// if($sliden_count>1){$news_slidepage=$sliden->random(1);}else{$news_slidepage=$sliden->random($sliden_count);}


		WorkVisa::where([['visa_status',0],['visa_future_post','<',Carbon::now()]])->update(['visa_status' => '1']);
		
		SlidePage::where([['slidepage_status',0],['slidepage_future_post','<',Carbon::now()->addDays(1)]])->update(['slidepage_status' => '1']);
		StudyVisa::where([['study_status',0],['study_future_post','<',Carbon::now()]])->update(['study_status' => '1']);
		Fashion::where([['fashion_status',0],['fashion_future_post','<',Carbon::now()]])->update(['fashion_status' => '1']);
		Festival::where([['festival_status',0],['festival_future_post','<',Carbon::now()]])->update(['festival_status' => '1']);
		BreakingNews::where([['breakingnews_status',0],['breakingnews_future_post','<',Carbon::now()]])->update(['breakingnews_status' => '1']);
		Politics::where([['politics_status',0],['politics_future_post','<',Carbon::now()]])->update(['politics_status' => '1']);

		
		// dd($uncheck); die;
		// dd($key->id);die;
		$news_slidepage=SlidePage::where('id','>',0)->orderBy('id','DESC')->first();
		$index=WorkVisa::where('visa_status','=',1)->orderBy('created_at','DESC')->get();
		$slides=Slidepage::where('slidepage_status',1)->orderBy('created_at','desc')->take(7)->get();
	// visa.................................................................>
		$visa_big=WorkVisa::where('id','>',0)->where('visa_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($visa_big)){$id=$visa_big->id;}// get id for avoid repeatation post 
		$visa_get=WorkVisa::where('id','!=',$id)->where('visa_status',1)->get();// take value of visa post 
		$count=$visa_get->count();// counting for geting random nomber
		if($count>5){ $visa=$visa_get->random(5);} else{$visa= $visa_get->random($count);} // id the count is over 8 then get data 8 posts otherwise take all data how much we post 
	//Fashion.................................................................>
		$fashion_big=fashion::where('id','>',0)->where('fashion_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($fashion_big)){$id=$fashion_big->id;}
		// get id for avoid repeatation post 
		$fashion_get=fashion::where('id','!=',$id)->where('fashion_status',1)->get();// take value of fashion post 
		$count=$fashion_get->count();// counting for geting random nomber
		if($count>5){ $fashion=$fashion_get->random(5);} else{$fashion= $fashion_get->random($count);} // id the count is over 8 then get data 8 posts otherwise take all data how much we post 
		
		//study.................................................................>
		$study_big=studyVisa::where('id','>',0)->where('study_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($study_big)){$id=$study_big->id;}
		// get id for avoid repeatation post 
		$study_get=studyVisa::where('id','!=',$id)->where('study_status',1)->get();// take value of study post 
		$count=$study_get->count();// counting for geting random nomber
		if($count>5){ $study=$study_get->random(5);} else{$study= $study_get->random($count);} // id the count is over 8 then get data 8 posts otherwise take all data how much we post
		//travel.................................................................>
		$travel_big=travelVisa::where('id','>',0)->where('travel_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($travel_big)){$id=$travel_big->id;}
		// get id for avoid repeatation post 
		$travel_get=travelVisa::where('id','!=',$id)->where('travel_status',1)->get();// take value of travel post 
		$count=$travel_get->count();// counting for geting random nomber
		if($count>5){ $travel=$travel_get->random(5);} else{$travel= $travel_get->random($count);} // id the count is over 8 then get data 8 posts otherwise take all data how much we post
		 
		$politics_big=politics::where('id','>',0)->where('politics_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($politics_big)){$id=$politics_big->id;}
		// get id for avoid repeatation post 
		$politics_get=politics::where('id','!=',$id)->where('politics_status',1)->get();// take value of politics post 
		$count=$politics_get->count();// counting for geting random nomber
		if($count>5){ $politics=$politics_get->random(5);} else{$politics= $politics_get->random($count);} // id the count is over 8 then get data 8 posts otherwise take all data how much we post 
		$technology_big=technology::where('id','>',0)->where('technology_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($technology_big)){$id=$technology_big->id;}
		// get id for avoid repeatation post 
		$technology_get=technology::where('id','!=',$id)->where('technology_status',1)->get();// take value of technology post 
		$count=$technology_get->count();// counting for geting random nomber
		if($count>5){ $technology=$technology_get->random(5);} else{$technology= $technology_get->random($count);} // id the count is over 8 then get data 8 posts otherwise take all data how much we post 

		return view('front.index',compact('index','news_slidepage','slides','visa_big','visa','fashion_big','fashion','study_big','study','travel_big','travel','politics_big','politics','technology_big','technology'));
	}
 
	public function slide_singlepage($id)
	{
		$slide_singlepage=SlidePage::findorFail($id);
		return view('front.slide_singlepage',compact('slide_singlepage'));
		

	}
	public function visa_singlepage($id)
	{
		$visa_singlepage=WorkVisa::findorFail($id);
		return view('front.visa_singlepage',compact('visa_singlepage'));
		

	}
	public function fashion_singlepage($id)
	{
		$fashion_singlepage=Fashion::findorFail($id);
		// dd($visa_singlepage);die;
		return view('front.fashion_singlepage',compact('fashion_singlepage'));
		

	}
	public function travel_singlepage($id)
	{
		$travel_singlepage=TravelVisa::findorFail($id);
		// dd($visa_singlepage);die;
		return view('front.travel_singlepage',compact('travel_singlepage'));
		

	}
	public function study_singlepage($id)
	{
		$study_singlepage=StudyVisa::findorFail($id);
		return view('front.study_singlepage',compact('study_singlepage'));
	

	}
	public function politics_singlepage($id)
	{
		$politics_singlepage=Politics::findorFail($id);
		return view('front.politics_singlepage',compact('politics_singlepage'));
	}
	public function technology_singlepage($id)
	{
		$technology_singlepage=technology::findorFail($id);
		return view('front.technology_singlepage',compact('technology_singlepage'));
	}
	public function visa_popularsingle($id)
	{
		$visa_popularsingle=WorkVisa::findorFail($id);
		return view('front.visa_popularsingle',compact('visa_popularsingle'));
	}
	public function study_popularsingle($id)
	{
		$study_popularsingle=StudyVisa::findorFail($id);
		return view('front.study_popularsingle',compact('study_popularsingle'));
	}
	public function fashion_popularsingle($id)
	{
		$fashion_popularsingle=Fashion::findorFail($id);
		return view('front.fashion_popularsingle',compact('fashion_popularsingle'));
	}
	public function technology_popularsingle($id)
	{
		$technology_popularsingle=technology::findorFail($id);
		return view('front.technology_popularsingle',compact('technology_popularsingle'));
	}
	public function politics_popularsingle($id)
	{
		$politics_popularsingle=politics::findorFail($id);
		return view('front.politics_popularsingle',compact('politics_popularsingle'));
	}
	public function festival_popularsingle($id)
	{
		$festival_popularsingle=festival::findorFail($id);
		return view('front.festival_popularsingle',compact('festival_popularsingle'));
	}
	// ...............................................................contact form........................................
	public function contact()
	{
		return view('front.contact');
	}
	public function send_contact(Request $request)// Guset News store data
	{	
		$send_contact =new Guest;
		$send_contact->name=$request->name;
		$send_contact->email=$request->email;
		$send_contact->message=$request->message;
		$send_contact->save();
		return back()->with('message_contact',' Thank You, Your Message For Us !! ');
	}
	public function get_guestdata()
	{
		$get_guest= Guest::orderBy('id','DESC')->get();
		// dd($get_guest);die;
		return view('back.guestmessage',compact('get_guest'));
	}
// ...............................................................last single page........................................
	public function visa_latestsingle($id)
	{
		$visa_latestsingle =WorkVisa::findorFail($id);
		return view('front.visa_latestsingle',compact('visa_latestsingle'));
	}
	public function study_latestsingle($id)
	{
		$study_latestsingle =studyVisa::findorFail($id);
		return view('front.study_latestsingle',compact('study_latestsingle'));
	}
	public function fashion_latestsingle($id)
	{
		$fashion_latestsingle =fashion::findorFail($id);
		return view('front.fashion_latestsingle',compact('fashion_latestsingle'));
	}
	public function breakingnews_single($id)
	{
		$breakingnews_single = BreakingNews::findorFail($id);
		return view('front.breakingnews_singlepage',compact('breakingnews_single'));
	}

	public function wonpolitics_singlepage($id)
	{
		$wonpolitics_singlepage = Politics::findorFail($id);
		return view('front.wonpolitics_singlepage',compact('wonpolitics_singlepage'));
	}

	public function wontechnology_singlepage($id)
	{
		$wontechnology_singlepage = Technology::findorFail($id);
		return view('front.wontechnology_singlepage',compact('wontechnology_singlepage'));
	}
	public function wonfestival_singlepage($id)
	{
		$wonfestival_singlepage = festival::findorFail($id);
		return view('front.wonfestival_singlepage',compact('wonfestival_singlepage'));
	}
//---------------------------------------------------------politics------------------------------------
	public function visa()
	{
		$news_slidepage=SlidePage::where('id','>',0)->orderBy('id','DESC')->first();
		$index=WorkVisa::where('visa_status','=',1)->orderBy('created_at','DESC')->get();
		$slides=Slidepage::where('slidepage_status',1)->orderBy('created_at','desc')->take(7)->get();
	    // visa.................................................................>
		$visa_big=WorkVisa::where('id','>',0)->where('visa_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($visa_big)){$id=$visa_big->id;}// get id for avoid repeatation post 
		$visa_get=WorkVisa::where('id','!=',$id)->where('visa_status',1)->get();// take value of visa post 
		$count=$visa_get->count();// counting for geting random nomber
		if($count>5){ $visa=$visa_get->random(5);} else{$visa= $visa_get->random($count);} // id the count is over 8 then get data 8 posts otherwise take all data how much we post 
	    //travel.................................................................>
		$travel_big=travelvisa::where('id','>',0)->where('travel_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($travel_big)){$id=$travel_big->id;}
		// get id for avoid repeatation post 
		$travel_get=travelvisa::where('id','!=',$id)->where('travel_status',1)->get();// take value of travel post 
		$count=$travel_get->count();// counting for geting random nomber
		if($count>5){ $travel=$travel_get->random(5);} else{$travel= $travel_get->random($count);} // id the count is over 8 then get data 8 posts otherwise take all data how much we post 
		//study.................................................................>
		$study_big=studyVisa::where('id','>',0)->where('study_status',1)->orderBy('id','DESC')->first();//big post
		if(isset($study_big)){$id=$study_big->id;}
		// get id for avoid repeatation post 
		$study_get=studyVisa::where('id','!=',$id)->where('study_status',1)->get();// take value of study post 
		$count=$study_get->count();// counting for geting random nomber
		if($count>5){ $study=$study_get->random(5);} else{$study= $study_get->random($count);} // id the count is over 8 then get data 8 posts otherwise take all data how much we post 
		
		return view('front.visa.visa',compact('index','news_slidepage','slides','visa_big','visa','study_big','study','travel_big','travel'));
	}
	public function get_guest_single($id)
	{
		$get_guest_single= Guest::findorFail($id);
		// dd($get_guest_single);die;
		return json_encode($get_guest_single);
	}
	public function delete_contact($id)
	{
		$delete_contact= Guest::findorFail($id);
		$name=$delete_contact->name;
		$delete_contact->delete();
		return back()->with('message_dp', $name.' Message Deleted ');
	}
}
