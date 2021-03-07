@extends('front.layout')
@section('about')

<div class="single_post_content">
	<h2><span class="bg_color">About Us</span></h2>

	
		<div class="card-bodys">
			<h4 class=""><span class="">We are </span></h4>
			<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
			<div class="abt-img">
				<img src="{{asset('image/admin/img2.jpg')}}" alt="">
				<img src="{{asset('image/admin/img3.jpg')}}" alt="">
				<img src="{{asset('image/admin/img2.jpg')}}" alt="">
			</div>

			
		</div>
		<div class="detail-us">

			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="box1 bg-success">
					<div class="title bg-warning">
						<h4>Shis</h4>
					</div>
					<div class="body">
						<h5 class="text-left">Contact Information</h5>
						<p class="inf-text">Email:</p>
						<span class="inf-ans">Shishantkmrs@gmail.com</span>
						<p class="inf-text">Phone No:</p>
						<span class="inf-ans">727825007</span>
						<p class="inf-text">Country:</p>
						<span class="inf-ans">Nepal</span>
						<p class="inf-text">Adress:</p>
						<span class="inf-ans">ul.Akacjowa, 3</span>
						<span class="inf-ans">6203, Gadki</span>
					</div>

				</div>
			</div>

			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="box1 bg-success">
					<div class="title bg-warning">
						<h4>Rc</h4>
					</div>
					<div class="body">
					<h5 class="text-left">Contact Information</h5>
						<p class="inf-text">Email:</p>
						<span class="inf-ans">Shishantkmrs@gmail.com</span>
						<p class="inf-text">Phone No:</p>
						<span class="inf-ans">727825007</span>
						<p class="inf-text">Country:</p>
						<span class="inf-ans">Nepal</span>
						<p class="inf-text">Adress:</p>
						<span class="inf-ans">ul.Akacjowa, 3</span>
						<span class="inf-ans">6203, Gadki</span>
					</div>

				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="box1 bg-success">
					<div class="title bg-warning">
						<h4>Mna</h4>
					</div>
					<div class="body">
						<h5 class="text-left">Contact Information</h5>
						<p class="inf-text">Email:</p>
						<span class="inf-ans">Shishantkmrs@gmail.com</span>
						<p class="inf-text">Phone No:</p>
						<span class="inf-ans">727825007</span>
						<p class="inf-text">Country:</p>
						<span class="inf-ans">Nepal</span>
						<p class="inf-text">Adress:</p>
						<span class="inf-ans">ul.Akacjowa, 3</span>
						<span class="inf-ans">6203, Gadki</span>
					</div>

				</div>
			</div>

		</div>
	
</div>
<style type="text/css" media="screen">
	.card-bodys {width:100%; text-align: center;}
	.card-bodys span {text-align: center;}
	.abt-img {width:95%; text-align: center; margin-top:20px; }	
	.abt-img img{ position:relative;width:200px; height: 200px; border-radius: 50%; background-size: cover; bottom:-10px; border:3px solid lavender; box-shadow: 1px 2px 5px 5px orange;}	
	.abt-img img:nth-child(1){ position:relative;width:200px; height: 200px; border-radius: 50%; background-size: cover; bottom:0px;left:50px;}	
	.abt-img img:nth-child(2){width:300px; height: 300px; border-radius: 50%; background-size: cover;z-index:1;}	
	.abt-img img:nth-child(3){width:200px; height: 200px; border-radius: 50%; background-size: cover; right:50px; z-index:0;}	
	.abt-img img{  -webkit-box-reflect: below 5px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(60%, transparent) , to(rgba(250, 250, 250, 0.3)));}	


	/*card (box)*/
	.detail-us{text-align: center;margin-top:75px; padding-left: 5px;}
	.title{color:red; background-color: red; text-transform: capitalize; height: 45px; border-top-right-radius: 4px; border-top-left-radius: 4px; z-index: 1;}
	.title h4{text-align: center;padding-top:15px; color:white;}
	.body{text-align: left; padding-left: 5px; padding-bottom: 5px;}
	.inf-text{font-size: 14px; color:#ba2f2f;    margin-top: 10px; }
	.inf-ans{font-size: 15px; color:#608199;margin-bottom: 5px;}
	.margin{padding-left: none;padding-right: none;}
</style>

@endsection