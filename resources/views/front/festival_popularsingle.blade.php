@extends('front.layout')
@section('festival_popularsingle')
<div class="single_page">
	
	<h1>{{$festival_popularsingle->festival_title}}</h1>
	<div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$festival_popularsingle->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$festival_popularsingle->festival_tag}}</a> </div>
	<div class="single_page_content"> <img class="img-center" src="{{asset('image/admin/festival/'.$festival_popularsingle->festival_img)}}" alt="">
		<p>{!!$festival_popularsingle->festival_text!!}</p>
		<blockquote>{!!$festival_popularsingle->festival_text!!}</blockquote>
		
		
		<a href="/index" title=""><button class="btn btn-green" >Back</button></a>
		
	</div>
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