@extends('front.layout')
@section('section')

{{-- slides --}}

<div class="col-lg-8 col-md-8 col-sm-8">
  <div class="slick_slider"> 
     @forelse($politics_slide as $politics)
    <div class="single_iteam"> <a href="{{ route('/wonpolitics_singlepage', ['id'=>$politics->id]) }}"> <img src="{{asset('image/admin/politics/'.$politics->politics_img)}}" alt=""></a>
      <div class="slider_article">
        <h2><a class="slider_tittle" href="{{ route('/wonpolitics_singlepage', ['id'=>$politics->id]) }}">
          {{$politics->politics_title}}

        </a></h2>

        <p> {!! Str::limit($politics->politics_text,200,'. . .')!!}</p>
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
  <h2><span class="bg_color">Politics</span></h2>
  <div class="single_post_content_left">
    <ul class="business_catgnav  wow fadeInDown">
      <li> @if(isset($politics_big))
        <figure class="bsbig_fig"> <a href="{{ route('/wonpolitics_singlepage', ['id'=>$politics->id]) }}" class="featured_img"> <img alt="" src="{{asset('image/admin/politics/'.$politics_big->politics_img)}}"> <span class="overlay"></span> </a>
          <figcaption> <a href="{{ route('/wonpolitics_singlepage', ['id'=>$politics->id]) }}">{{$politics_big->politics_title}}</a> </figcaption>
          <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$politics_big->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$politics_big->politics_tag}}</a> </div>
          <p>{!! Str::limit($politics_big->politics_text, 350, ' ...') !!}</p>
        </figure>
        @else NO Data 
        @endif
      </li>
    </ul>
  </div>
  <div class="single_post_content_right">
    <ul class="spost_nav">
      @forelse($politics_news as $politics_nws)
      <li>
        <div class="media wow fadeInDown crop_img"> <a href="{{ route('/wonpolitics_singlepage', ['id'=>$politics->id]) }}" class="media-left">
         <img alt="" src="{{asset('image/admin/politics/'.$politics_nws->politics_img)}}"> </a>
         <div class="media-body"> <a href="{{ route('/wonpolitics_singlepage', ['id'=>$politics->id]) }}" class="catg_title font-weight-bold">
           {{ Str::limit($politics_nws->politics_title,150,' . . . .')}}</a><br>
           <div class="commentbox"> <a href="#"> <i class="fa fa-user"></i> Shis </a> <span> <i class="fa fa-calendar"></i> {{$politics_nws->created_at}} </span> <a href="#"><i class="fa fa-tags"></i>{{$politics_nws->politics_tag}}</a> </div>
        </div>
       </div>
     </li>
     @empty No data
     @endforelse



   </ul>
 </div>
</div>









@endsection