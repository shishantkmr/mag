@extends('front.layout')
@section('section')

{{-- slides --}}

<div class="col-lg-8 col-md-8 col-sm-8">
  <div class="slick_slider"> 
    @forelse($slides as $slide)
    <div class="single_iteam"> <a href="{{ route('/slide_singlepage',['id'=>$slide->id]) }}"> <img src="{{asset('image/admin/slidepage/'.$slide->slidepage_img1)}}" alt=""></a>
      <div class="slider_article">
        <h2><a class="slider_tittle" href="{{ route('/slide_singlepage',['id'=>$slide->id]) }}">
          {!!Str::limit($slide->slidepage_title,150,'...')!!}

        </a></h2>

        <p>
         
          
        </p>
      </div>
    </div>
    @empty
    No Data 
    @endforelse



    {{--  {{-- right nav --}}
  

    
  </div>
</div>

@endsection
@section('index')

<div class="single_post_content">
  <h2><span class="bg_color">Visa</span></h2>
  <div class="single_post_content_left">
    <ul class="business_catgnav  wow fadeInDown">
      <li>
        @if(isset($visa_big))
        <figure class="bsbig_fig"> <a href="{{ route('/visa_singlepage',['id'=>$visa_big->id]) }}" class="featured_img"> <img alt="" src="{{asset('image/admin/visa/'.$visa_big->visa_img)}}"> <span class="overlay"></span> </a>
          <figcaption> <a href="{{ route('/visa_singlepage',['id'=>$visa_big->id]) }}">{{$visa_big->visa_title}}</a> </figcaption>
          <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$visa_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$visa_big->visa_tag}}</a> </div>
          <p>{!! Str::limit($visa_big->visa_text, 350, ' ...') !!}</p>   
           <hr>
        </figure>
        @else NO Data 
        @endif
      </li>
    </ul>
  </div>
  <div class="single_post_content_right">
    <ul class="spost_nav">
      @forelse($visa as $visa_data)
      <li>
        <div class="media wow fadeInDown crop_img"> <a href="{{ route('/visa_singlepage',['id'=>$visa_data->id]) }}" class="media-left">
         <img alt="" src="{{asset('image/admin/visa/'.$visa_data->visa_img)}}"> </a>
         <div class="media-body"> <a href="{{ route('/visa_singlepage',['id'=>$visa_data->id]) }}" class="catg_title font-weight-bold">
           {{ Str::limit($visa_data->visa_title,150,' . . . .')}}</a><br>
           <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$visa_data->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$visa_data->visa_tag}}</a> </div>
        </div>
       </div>
     </li>
     @empty No data
     @endforelse



   </ul>
 </div>
</div>




<div class="fashion_technology_area">

  <div class="fashion">
    <div class="single_post_content">
      <h2><span class="bg_color">Fashion</span></h2>
      <ul class="business_catgnav wow fadeInDown">
        <li>@if(isset($fashion_big))
          <figure class="bsbig_fig"> <a href="{{route('/fashion_singlepage',['id'=>$fashion_big->id])}}" class="featured_img"> <img alt="" src="{{asset('image/admin/fashion/'.$fashion_big->fashion_img)}}"> <span class="overlay"></span> </a>
            <figcaption> <a href="{{route('/fashion_singlepage',['id'=>$fashion_big->id])}}">{{$fashion_big->fashion_title}}</a> </figcaption>
          <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$fashion_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$fashion_big->fashion_tag}}</a> </div>
            <p>{!! Str::limit($fashion_big->fashion_text,150,' . . .')!!}</p>   
             <hr>
          </figure>
          @else No data
          @endif
        </li>
      </ul>
      <ul class="spost_nav">
        @forelse($fashion as $fashion_data)
        <li>
          <div class="media wow fadeInDown crop_img"> <a href="{{route('/fashion_singlepage',['id'=>$fashion_data->id])}}" class="media-left"> <img alt="" src="{{asset('image/admin/fashion/'.$fashion_data->fashion_img)}}"> </a>
            <div class="media-body"> <a href="{{route('/fashion_singlepage',['id'=>$fashion_data->id])}}" class="catg_title">{!!$fashion_data->fashion_title!!}</a> 
              <br>
               <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$fashion_data->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$fashion_data->fashion_tag}}</a> </div>

            </div>

          </div>
        </li>
        @empty No Data
        @endforelse

      </ul>
    </div>
  </div>

  <div class="technology">
    <div class="single_post_content">
      <h2><span class="bg_color">Study</span></h2>
      <ul class="business_catgnav">
        <li>@if($study_big)
          <figure class="bsbig_fig wow fadeInDown"> <a  href="{{ route('/study_singlepage',['id'=>$study_big->id]) }}" class="featured_img"> <img alt="" src="{{asset('image/admin/study/'.$study_big->study_img)}}"> <span class="overlay"></span> </a>
               <figcaption> <a href="{{ route('/study_singlepage',['id'=>$study_big->id]) }}">{{$study_big->study_title}}</a> </figcaption>
               <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$study_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$study_big->study_tag}}</a> </div>
           
            <p>{!! Str::limit($study_big->study_text,300, ' . . .')!!}</p>
            <hr>
          </figure>
          @else No Data
          @endif
        </li>
      </ul>
      <ul class="spost_nav">
        @forelse($study as $study_data)
        <li>
          <div class="media wow fadeInDown"> <a  href="{{ route('/study_singlepage',['id'=>$study_data->id]) }}" class="media-left"> <img alt="" src="{{asset('image/admin/study/'.$study_data->study_img)}}"> </a>
            <div class="media-body"> <a href="{{ route('/study_singlepage',['id'=>$study_data->id]) }}"class="catg_title">{{$study_data->study_title}}</a> <br>
             <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$study_data->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$study_data->study_tag}}</a> </div>  </div>
          </div>
        </li>
        @empty No Data
        @endforelse
        
        
      </ul>
    </div>
  </div>

</div>




<div class="fashion_technology_area">

  <div class="fashion">
    <div class="single_post_content">
      <h2><span class="bg_color">Technology</span></h2>
      <ul class="business_catgnav">
        <li>@if($technology_big)
          <figure class="bsbig_fig wow fadeInDown"> <a  href="{{ route('/technology_singlepage',['id'=>$technology_big->id]) }}" class="featured_img"> <img alt="" src="{{asset('image/admin/technology/'.$technology_big->technology_img)}}"> <span class="overlay"></span> </a>
            <figcaption> <a href="{{ route('/technology_singlepage',['id'=>$technology_big->id]) }}">{{$technology_big->technology_title}}</a> </figcaption>
             <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$technology_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$technology_big->technology_tag}}</a> </div>
            <p>{!! Str::limit($technology_big->technology_text,300, ' . . .')!!}</p>
                <hr>
          </figure>
          @else No Data
          @endif
        </li>
      </ul>
      <ul class="spost_nav">
        @forelse($technology as $technology_data)
        <li>
          <div class="media wow fadeInDown "> <a  href="{{ route('/technology_singlepage',['id'=>$technology_data->id]) }}" class="media-left "> <img alt="" src="{{asset('image/admin/technology/'.$technology_data->technology_img)}}"> </a>
            <div class="media-body"> <a href="{{ route('/technology_singlepage',['id'=>$technology_data->id]) }}"class="catg_title">{{$technology_data->technology_title}}</a><br> <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$technology_data->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$technology_data->technology_tag}}</a> </div></div>
          </div>
        </li>
        @empty No Data
        @endforelse
        
        
      </ul>
    </div>
  </div>

  <div class="technology">
    <div class="single_post_content">
      <h2><span class="bg_color">Politics</span></h2>
      <ul class="business_catgnav">
        <li>@if($politics_big)
          <figure class="bsbig_fig wow fadeInDown"> <a  href="{{ route('/politics_singlepage',['id'=>$politics_big->id]) }}" class="featured_img"> <img alt="" src="{{asset('image/admin/politics/'.$politics_big->politics_img)}}"> <span class="overlay"></span> </a>
            <figcaption> <a href="{{ route('/politics_singlepage',['id'=>$politics_big->id]) }}">{{$politics_big->politics_title}}</a> </figcaption>
             <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$politics_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$politics_big->politics_tag}}</a> </div>
            <p>{!! Str::limit($politics_big->politics_text,300, ' . . .')!!}</p>    <hr>
          </figure>
          @else No Data
          @endif
        </li>
      </ul>
      <ul class="spost_nav">
        @forelse($politics as $politics_data)
        <li>
          <div class="media wow fadeInDown "> <a  href="{{ route('/politics_singlepage',['id'=>$politics_data->id]) }}" class="media-left "> <img alt="" src="{{asset('image/admin/politics/'.$politics_data->politics_img)}}"> </a>
            <div class="media-body"> <a href="{{ route('/politics_singlepage',['id'=>$politics_data->id]) }}"class="catg_title">{{$politics_data->politics_title}}</a><br> <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$politics_data->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$politics_data->politics_tag}}</a> </div></div>
          </div>
        </li>
        @empty No Data
        @endforelse
        
        
      </ul>
    </div>
  </div>

</div>
@endsection