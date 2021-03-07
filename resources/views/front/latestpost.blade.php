
<div class="col-lg-4 col-md-4 col-sm-4">
	<div class="latest_post bgcolor">
		<h2><span class="bg_color">Latest post</span></h2>
		<div class="latest_post_container"> 
			<div id="prev-button"><i class="fa fa-chevron-up"></i></div>
			<ul class="latest_postnav">
				<?php
				$latestpost_visa=DB::table('work_visas')->where('visa_status',1)->whereNull('deleted_at')->latest('created_at')->get();
				$latestpost_count=$latestpost_visa->count();
				if($latestpost_count>2){$latest_visa=$latestpost_visa->random(2);}else{$latest_visa=$latestpost_visa->random($latest_visa=$latestpost_count);}

				$latestpost_study=DB::table('studies')->where('study_status',1)->whereNull('deleted_at')->latest('created_at')->get();
				$latestpost_count=$latestpost_study->count();
				if($latestpost_count>3){$latest_study=$latestpost_study->random(3);}else{$latest_study=$latestpost_study->random($latest_study=$latestpost_count);}

				$latestpost_fashion=DB::table('fashions')->where('fashion_status',1)->whereNull('deleted_at')->latest('created_at')->get();
				$latestpost_count=$latestpost_fashion->count();
				if($latestpost_count>3){$latest_fashion=$latestpost_fashion->random(3);}else{$latest_fashion=$latestpost_fashion->random($latestpost_count);}

				
				?>
				@forelse($latest_visa as $visa_latests)
				<li>
					<div class="media"> <a href="{{ route('/visa_latestsingle',['id'=>$visa_latests->id]) }}" class="media-left"> <img alt="" src="{{asset('image/admin/visa/'.$visa_latests->visa_img)}}"> </a>
						<div class="media-body"> <a href="{{ route('/visa_latestsingle',['id'=>$visa_latests->id]) }}" class="catg_title"> {{$visa_latests->visa_title}}</a><br> <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$visa_latests->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$visa_latests->visa_tag}}</a> </div> </div>
					</div>
				</li>

				@empty No Data found
				@endforelse
				@forelse($latest_study as $study_latests)
				<li>
					<div class="media"> <a href="{{ route('/study_latestsingle',['id'=>$study_latests->id]) }}" class="media-left"> <img alt="" src="{{asset('image/admin/study/'.$study_latests->study_img)}}"> </a>
						<div class="media-body"> <a href="{{ route('/study_latestsingle',['id'=>$study_latests->id]) }}" class="catg_title"> {{$study_latests->study_title}}</a><br> <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$study_latests->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$study_latests->study_tag}}</a> </div> </div>
					</div>
				</li>
				@empty No Data found
				@endforelse

				@forelse($latest_fashion as $fashion_latests)
				<li>
					<div class="media"> <a href="{{ route('/fashion_latestsingle',['id'=>$fashion_latests->id]) }}" class="media-left"> <img alt="" src="{{asset('image/admin/fashion/'.$fashion_latests->fashion_img)}}"> </a>
						<div class="media-body"> <a href="{{ route('/fashion_latestsingle',['id'=>$fashion_latests->id]) }}" class="catg_title"> {{$fashion_latests->fashion_title}}</a><br> <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$fashion_latests->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$fashion_latests->fashion_tag}}</a> </div></div>
					</div>
				</li>
				@empty No Data found
				@endforelse

			</ul>
			<div id="next-button"><i class="fa  fa-chevron-down"></i></div>
		</div>
	</div>
</div>