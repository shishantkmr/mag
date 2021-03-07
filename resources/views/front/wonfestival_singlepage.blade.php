@extends('front.layout')
@section('wonfestival_singlepage')
<div class="single_page">
	
	<h1>{{$wonfestival_singlepage->festival_title}}</h1>
	<div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Shis</a> <span><i class="fa fa-calendar"></i>{{$wonfestival_singlepage->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$wonfestival_singlepage->festival_tag}}</a> </div>
	<div class="single_page_content"> <img class="img-center" src="{{asset('image/admin/festival/'.$wonfestival_singlepage->festival_img)}}" alt="">
		
		<blockquote>{!!$wonfestival_singlepage->festival_text!!}</blockquote>
		
		
		<a href="{{ URL::previous() }}" title=""><button class="btn btn-green" >Back</button></a>
		
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