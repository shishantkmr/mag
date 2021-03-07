@extends('front.layout')
@section('visa_popularsingle')
<div class="single_page">
	
	<h1>{{$visa_popularsingle->visa_title}}</h1>
	<div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$visa_popularsingle->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$visa_popularsingle->visa_tag}}</a> </div>
	<div class="single_page_content"> <img class="img-center" src="{{asset('image/admin/visa/'.$visa_popularsingle->visa_img)}}" alt="">
		<p>{!!$visa_popularsingle->visa_text!!}</p>
		<blockquote>{!!$visa_popularsingle->visa_text!!}</blockquote>
		
		
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