@extends('front.layout')
@section('section')

{{-- slides --}}

<div class="col-lg-8 col-md-8 col-sm-8">
  <div class="slick_slider"> 
     @forelse($festival_slide as $festival)
    <div class="single_iteam"> <a href="{{ route('/wonfestival_singlepage', ['id'=>$festival->id]) }}"> <img src="{{asset('image/admin/festival/'.$festival->festival_img)}}" alt=""></a>
      <div class="slider_article">
        <h2><a class="slider_tittle" href="{{ route('/wonfestival_singlepage', ['id'=>$festival->id]) }}">
          {{$festival->festival_title}}

        </a></h2>

        <p> {!! Str::limit($festival->festival_text,200,'. . .')!!}</p>
      </div>
    </div>
    @empty
    No Data 
    @endforelse


    {{--  {{-- right nav --}}
    {{-- @include('front.popularpost') --}}

    
  </div>
</div>

@endsection
@section('index')

<div class="single_post_content">
  <h2><span class="bg_color">Festival</span></h2>
  <div class="single_post_content_left">
    <ul class="business_catgnav  wow fadeInDown">
      <li> @if(isset($festival_big))
        <figure class="bsbig_fig"> <a href="{{ route('/wonfestival_singlepage', ['id'=>$festival->id]) }}" class="featured_img"> <img alt="" src="{{asset('image/admin/festival/'.$festival_big->festival_img)}}"> <span class="overlay"></span> </a>
          <figcaption> <a href="{{ route('/wonfestival_singlepage', ['id'=>$festival->id]) }}">{{$festival_big->festival_title}}</a> </figcaption>
          <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$festival_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$festival_big->festival_tag}}</a> </div>
          <p>{!! Str::limit($festival_big->festival_text, 350, ' ...') !!}</p>
        </figure>
        @else NO Data 
        @endif
      </li>
    </ul>
  </div>
  <div class="single_post_content_right">
    <ul class="spost_nav">
      @forelse($festival_news as $festival_nws)
      <li>
        <div class="media wow fadeInDown crop_img"> <a href="{{ route('/wonfestival_singlepage', ['id'=>$festival->id]) }}" class="media-left">
         <img alt="" src="{{asset('image/admin/festival/'.$festival_nws->festival_img)}}"> </a>
         <div class="media-body"> <a href="{{ route('/wonfestival_singlepage', ['id'=>$festival->id]) }}" class="catg_title font-weight-bold">
           {{ Str::limit($festival_nws->festival_title,150,' . . . .')}}</a><br>
           <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$festival_nws->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$festival_nws->festival_tag}}</a> </div>
        </div>
       </div>
     </li>
     @empty No data
     @endforelse



   </ul>
 </div>
</div>









@endsection