@extends('front.layout')
@section('section')

{{-- slides --}}

<div class="col-lg-8 col-md-8 col-sm-8">
  <div class="slick_slider"> 
     @forelse($technology_slide as $technology)
    <div class="single_iteam"> <a href="{{ route('/wontechnology_singlepage', ['id'=>$technology->id]) }}"> <img src="{{asset('image/admin/technology/'.$technology->technology_img)}}" alt=""></a>
      <div class="slider_article">
        <h2><a class="slider_tittle" href="{{ route('/wontechnology_singlepage', ['id'=>$technology->id]) }}">
          {{$technology->technology_title}}

        </a></h2>

        <p> {!! Str::limit($technology->technology_text,200,'. . .')!!}</p>
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
  <h2><span class="bg_color">Technology</span></h2>
  <div class="single_post_content_left">
    <ul class="business_catgnav  wow fadeInDown">
      <li> @if(isset($technology_big))
        <figure class="bsbig_fig"> <a href="{{ route('/wontechnology_singlepage', ['id'=>$technology->id]) }}" class="featured_img"> <img alt="" src="{{asset('image/admin/technology/'.$technology_big->technology_img)}}"> <span class="overlay"></span> </a>
          <figcaption> <a href="{{ route('/wontechnology_singlepage', ['id'=>$technology->id]) }}">{{$technology_big->technology_title}}</a> </figcaption>
          <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$technology_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$technology_big->technology_tag}}</a> </div>
          <p>{!! Str::limit($technology_big->technology_text, 350, ' ...') !!}</p>
        </figure>
        @else NO Data 
        @endif
      </li>
    </ul>
  </div>
  <div class="single_post_content_right">
    <ul class="spost_nav">
      @forelse($technology_news as $technology_nws)
      <li>
        <div class="media wow fadeInDown crop_img"> <a href="{{ route('/wontechnology_singlepage', ['id'=>$technology->id]) }}" class="media-left">
         <img alt="" src="{{asset('image/admin/technology/'.$technology_nws->technology_img)}}"> </a>
         <div class="media-body"> <a href="{{ route('/wontechnology_singlepage', ['id'=>$technology->id]) }}" class="catg_title font-weight-bold">
           {{ Str::limit($technology_nws->technology_title,150,' . . . .')}}</a><br>
           <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$technology_nws->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$technology_nws->technology_tag}}</a> </div>
        </div>
       </div>
     </li>
     @empty No data
     @endforelse



   </ul>
 </div>
</div>









@endsection