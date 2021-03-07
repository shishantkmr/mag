@extends('front.layout')
@section('slide_singlepage')
<div class="single_page">
	
	<h1>{{$slide_singlepage->slidepage_title}}</h1>
	<div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$slide_singlepage->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$slide_singlepage->slide_tag}}</a> </div>
	<div class="single_page_content"> <img class="img-center" src="{{asset('image/admin/slidepage/'.$slide_singlepage->slidepage_img1)}}" alt="">
		<p>{!!$slide_singlepage->slidepage_text!!}</p>
		<blockquote>{!!$slide_singlepage->slidepage_text!!}</blockquote>
		
		
		<a href="/index" title=""><button class="btn btn-green" >Back</button></a>
		
	</div>
						{{--   <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
					        <div>
					          <h3>City Lights</h3>
					          <img src="../images/post_img1.jpg" alt=""/> </div>
					        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
					        <div>
					          <h3>Street Hills</h3>
					          <img src="{{asset('image/admin/img3.jpg')}}" alt=""/> </div>
					        </a> </nav> --}}
	<div class="social_link">
		<ul class="sociallink_nav">
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		</ul>
	</div>
	
</div>
@endsection