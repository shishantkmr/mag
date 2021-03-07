 <div class="col-lg-4 col-md-4 col-sm-4">
  <aside class="right_content">
    <div class="single_sidebar bg-success bgcolor">
      <h2><span class="bg_color">popular Post</span></h2>
      <ul class="spost_nav">
        <?php
        $popularpost_visa=DB::table('work_visas')->where('visa_status',1)->where('visa_popular',1)->whereNull('deleted_at')->get();
        $popularpost_count=$popularpost_visa->count();
        if($popularpost_count>3){$popular_visa=$popularpost_visa->random(3);}else{$popular_visa=$popularpost_visa->random($popular_visa=$popularpost_count);}

        $popularpost_study=DB::table('studies')->where('study_status',1)->where('study_popular',1)->whereNull('deleted_at')->get();
        $popularpost_count=$popularpost_study->count();
        if($popularpost_count>3){$popular_study=$popularpost_study->random(3);}else{$popular_study=$popularpost_study->random($popular_study=$popularpost_count);}

        $popularpost_fashion=DB::table('fashions')->where('fashion_status',1)->where('fashion_popular',1)->whereNull('deleted_at')->get();
        $popularpost_count=$popularpost_fashion->count();
        if($popularpost_count>3){$popular_fashion=$popularpost_fashion->random(3);}else{$popular_fashion=$popularpost_fashion->random($popularpost_count);}

        $popularpost_technology=DB::table('technologies')->where('technology_status',1)->where('technology_popular',1)->whereNull('deleted_at')->get();
        $popularpost_count=$popularpost_technology->count();
        if($popularpost_count>3){$popular_technology=$popularpost_technology->random(3);}else{$popular_technology=$popularpost_technology->random($popularpost_count);}
        $popularpost_festival=DB::table('festivals')->where('festival_status',1)->where('festival_popular',1)->whereNull('deleted_at')->get();
        $popularpost_count=$popularpost_festival->count();
        if($popularpost_count>3){$popular_festival=$popularpost_festival->random(3);}else{$popular_festival=$popularpost_festival->random($popularpost_count);}
        $popularpost_politics=DB::table('politics')->where('politics_status',1)->where('politics_popular',1)->whereNull('deleted_at')->get();
        $popularpost_count=$popularpost_politics->count();
        if($popularpost_count>3){$popular_politics=$popularpost_politics->random(3);}else{$popular_politics=$popularpost_politics->random($popularpost_count);}
        ?>
        @forelse($popular_visa as $visa)
        <li>
          <div class="media wow fadeInDown"> <a href="{{route('/visa_popularsingle',['id'=>$visa->id])}}" class="media-left"> <img alt="" src="{{asset('image/admin/visa/'.$visa->visa_img)}}"> </a>
            <div class="media-body"> <a href="{{route('/visa_popularsingle',['id'=>$visa->id])}}" class="catg_title"> {{$visa->visa_title}}</a> <br><div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis &nbsp;</a> <span>&nbsp; <i class="fa fa-calendar"></i> {{$visa->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$visa->visa_tag}}</a> </div> </div>
          </div>
        </li>
        @empty No Data
        @endforelse

        @forelse($popular_study as $study)
        <li>
          <div class="media wow fadeInDown"> <a href="{{route('/study_popularsingle',['id'=>$study->id])}}" class="media-left"> <img alt="" src="{{asset('image/admin/study/'.$study->study_img)}}"> </a>
            <div class="media-body"> <a href="{{route('/study_popularsingle',['id'=>$study->id])}}" class="catg_title"> {{$study->study_title}}</a> <br><div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis&nbsp; </a>&nbsp; <span> <i class="fa fa-calendar"></i> {{$study->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$study->study_tag}}</a> </div> 
          </div>
          </div>
        </li>
        @empty No Data
        @endforelse
        @forelse($popular_fashion as $fashion)
        <li>
          <div class="media wow fadeInDown"> <a href="{{route('/fashion_popularsingle',['id'=>$fashion->id])}}" class="media-left"> <img alt="" src="{{asset('image/admin/fashion/'.$fashion->fashion_img)}}"> </a>
            <div class="media-body"> <a href="{{route('/fashion_popularsingle',['id'=>$fashion->id])}}" class="catg_title"> {{$fashion->fashion_title}}</a> <br> <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis&nbsp; </a>&nbsp; <span> <i class="fa fa-calendar"></i> {{$fashion->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$fashion->fashion_tag}}</a> </div></div>
          </div>
        </li>
        @empty No Data
        @endforelse
        @forelse($popular_technology as $technology)
        <li>
          <div class="media wow fadeInDown"> <a href="{{route('/technology_popularsingle',['id'=>$technology->id])}}" class="media-left"> <img alt="" src="{{asset('image/admin/technology/'.$technology->technology_img)}}"> </a>
            <div class="media-body"> <a href="{{route('/technology_popularsingle',['id'=>$technology->id])}}" class="catg_title"> {{$technology->technology_title}}</a> <br> <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis &nbsp;</a>&nbsp; <span> <i class="fa fa-calendar"></i> {{$technology->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$technology->technology_tag}}</a> </div></div>
          </div>
        </li>
        @empty No Data
        @endforelse
        @forelse($popular_festival as $festival)
        <li>
          <div class="media wow fadeInDown"> <a href="{{route('/festival_popularsingle',['id'=>$festival->id])}}" class="media-left"> <img alt="" src="{{asset('image/admin/festival/'.$festival->festival_img)}}"> </a>
            <div class="media-body"> <a href="{{route('/festival_popularsingle',['id'=>$festival->id])}}" class="catg_title"> {{$festival->festival_title}}</a> <br> <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis &nbsp;</a>&nbsp; <span> <i class="fa fa-calendar"></i> {{$festival->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$festival->festival_tag}}</a> </div></div>
          </div>
        </li>
        @empty No Data
        @endforelse
        @forelse($popular_politics as $politics)
        <li>
          <div class="media wow fadeInDown"> <a href="{{route('/politics_popularsingle',['id'=>$politics->id])}}" class="media-left"> <img alt="" src="{{asset('image/admin/politics/'.$politics->politics_img)}}"> </a>
            <div class="media-body"> <a href="{{route('/politics_popularsingle',['id'=>$politics->id])}}" class="catg_title"> {{$politics->politics_title}}</a> <br> <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis&nbsp; </a> &nbsp;<span> <i class="fa fa-calendar"></i> {{$politics->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$politics->politics_tag}}</a> </div></div>
          </div>
        </li>
        @empty No Data
        @endforelse
      </ul>
    </div>

    <div class="single_sidebar wow fadeInDown">
      <h2><span  class="bg_color">Sponsor</span></h2>
      <a class="sideAdd" href="#"><img src="{{asset('image/front/add_img.jpg')}}" alt=""></a> 
    </div>
    <div class="single_sidebar wow fadeInDown">
      <h2><span class="bg_color">Category Archive</span></h2>
      <select  class="catgArchive" size="1" name="links" onchange="functionToTriggerClick(this.value)">
        <option>Select Category</option>
        <option value="/visa"><a href="/visa">Visa</a></option>
        <option value="/wonpolitics">Politics</option>
        <option value="/wontechnology">Technology</option>
        <option value="/wonfestival">Festival</option>
        <option value="/about">About</option>
        <option value="/contact">Contact</option>
      </select>
     
    </div> 

<script>
{{-- select and tringger the route --}}
   function functionToTriggerClick(link) {

     if(link != ''){
        window.location.href=link;
        }
    }  

</script>
            {{-- <div class="single_sidebar wow fadeInDown">
              <h2><span class="bg_color">Links</span></h2>
              <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Rss Feed</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Life &amp; Style</a></li>
              </ul>
            </div> --}}
          </aside>
        </div>
       
