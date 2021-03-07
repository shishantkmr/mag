@extends('front.layout')
@section('politics')
<div class="single_post_content">
  <h2><span class="bg_color">Student Visa</span></h2>
  <div class="single_post_content_left">
    <ul class="business_catgnav  wow fadeInDown">
      <li>
        @if(isset($visa_big))
        <figure class="bsbig_fig"> <a href="{{ route('/visa_singlepage',['id'=>$visa_big->id]) }}" class="featured_img"> <img alt="" src="{{asset('image/admin/visa/'.$visa_big->visa_img)}}"> <span class="overlay"></span> </a>
          <figcaption> <a href="{{ route('/visa_singlepage',['id'=>$visa_big->id])}}">{{$visa_big->visa_title}}</a> </figcaption>
          <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$visa_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$visa_big->visa_tag}}</a> </div>
          <p>{!! Str::limit($visa_big->visa_text, 350, ' ...') !!}</p>
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
      <h2><span class="bg_color">Work Visa Cat(D)</span></h2>
      <ul class="business_catgnav wow fadeInDown">
        <li>@if(isset($fashion_big))
          <figure class="bsbig_fig"> <a href="{{route('/fashion_singlepage',['id'=>$fashion_big->id])}}" class="featured_img"> <img alt="" src="{{asset('image/admin/fashion/'.$fashion_big->fashion_img)}}"> <span class="overlay"></span> </a>
            <figcaption> <a href="{{route('/fashion_singlepage',['id'=>$fashion_big->id])}}">{{$fashion_big->fashion_title}}</a> </figcaption>
          <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$fashion_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$fashion_big->fashion_tag}}</a> </div>
            <p>{{ Str::limit($fashion_big->fashion_text,150,' . . .')}}</p>
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
      <h2><span class="bg_color">Travel Visa</span></h2>
      <ul class="business_catgnav">
        <li>@if($study_big)
          <figure class="bsbig_fig wow fadeInDown"> <a  href="{{ route('/study_singlepage',['id'=>$study_big->id]) }}" class="featured_img"> <img alt="" src="{{asset('image/admin/study/'.$study_big->study_img)}}"> <span class="overlay"></span> </a>
               <figcaption> <a href="{{ route('/study_singlepage',['id'=>$study_big->id]) }}">{{$study_big->study_title}}</a> </figcaption>
               <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$study_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$study_big->study_tag}}</a> </div>
           
            <p>{!! Str::limit($study_big->study_text,300, ' . . .')!!}</p>
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
@endsection