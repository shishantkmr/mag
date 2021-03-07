@extends('front.layout')
@section('slide_singlepage')
<div class="single_page">
	
	<h1>{{$study_latestsingle->study_title}}</h1>
	<div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$study_latestsingle->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$study_latestsingle->slide_tag}}</a> </div>
	<div class="single_page_content"> <img class="img-center" src="{{asset('image/admin/study/'.$study_latestsingle->study_img)}}" alt="">
		<p>{!!$study_latestsingle->study_text!!}</p>
		<blockquote>{!!$study_latestsingle->study_text!!}</blockquote>
		
		
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