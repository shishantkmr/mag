@extends('back.layout')
@section('create_slidepage')
@section('breadcrumb')
Slidepage
@endsection
<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="/admin/create_slidepage" method="Post" enctype="multipart/form-data">
			@csrf

			<label class=" font-weight-bold text-white form-control bg-success">Create Post </label>
			<div class="form-group">
									
									<select name="slide"class="selectpicker form-control" data-style="btn-outline-primary">
										@forelse($slide as $slides)
											<option value="{{$slides->id}}">{{$slides->slide_group}}</option>
											@empty
											No Data
											@endforelse
											
										
								</div>
			{{-- title --}}
			<div class="form-group">
				<input name="slidepage_title"class="form-control inputbox_color" type="text" placeholder="slide Title..."data-toggle="tooltip" data-placement="left" title="slide Title">
			</div>
			{{-- slidepage --}}
			<div class="form-group">
				<textarea name="slidepage_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="slide text here..."data-toggle="tooltip" data-placement="left" title="Type slide text"></textarea>
			</div>
			{{-- img 1--}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile1(event)" name="slidepage_img1"class="form-control inputbox_color input_show1" placeholder="slidepage img...">
				<img id="output1"/ style="width:200px;height: 200px; border-radius: 50%; display:inline; border:4px solid lavender; ">
			</div>
			{{-- img 2 --}}
			{{-- <div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile2(event)" name="slidepage_img2"class="form-control inputbox_color input_show2" placeholder="slidepage img...">
				<img id="output2"/style="width:200px;height: 200px; border-radius: 50%; display:inline; border:4px solid lavender;">
			</div>
			{{-- img 3--}}
			{{-- <div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile3(event)" name="slidepage_img3"class="form-control inputbox_color input_show3" placeholder="slidepage img...">
				<img id="output3"/style="width:200px;height: 200px; border-radius: 50%; display:inline; border:4px solid lavender;">
			</div> --}}
			{{-- news--}}
			<div class="form-group">
				<textarea type="text" name="slidepage_news"class="form-control inputbox_color textarea_editor" placeholder="Main News ..."  data-toggle="tooltip"data-placement="left" title="slide news" id="news"></textarea>
				
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="slidepage_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="slidepage url" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="slidepage_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="slidepage slug..."data-toggle="tooltip" data-placement="left" title="slidepage slug"id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="slidepage_tag"class="form-control inputbox_color" type="text" placeholder="slidepage tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="slidepage_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" >
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="slidepage_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" >
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="slidepage_future_post"  id="filter-date" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">

				<button type="submit" id ="success"class="btn btn-success">Success</button>
			</div>
		</form>
		{{-- Edit post --}}
		@if(isset($edit_slidepage->id)) 
		<form action="{{route('/update_slidepage',['id'=>$edit_slidepage->id])}}" method="POST" enctype="multipart/form-data">
			@endif	@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Edit Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="slidepage_title" id="slidepage_edit_title" class="form-control inputbox_color" type="text"  placeholder="slidepage Title..."data-toggle="tooltip" data-placement="left" title="slidepage Title">
			</div>
			{{-- slidepage --}}
			<div class="form-group">
				<input name="slidepage_text"id="slidepage_edit_text"class="form-control inputbox_color" type="text" placeholder="slidepage here..."data-toggle="tooltip" data-placement="left" title="Type slidepage">
			</div>
			{{-- img 1--}}
			<div class="form-group">
				
				<input name="slidepage_img1" type="file" accept="image/*" onchange="loadFiles1(event)"class="form-control inputbox_color input_shows1" placeholder="slidepage img...">
				<img id="slidepage_edit_img1"class="mb-3"src="" alt=""style="width:200px;height: 200px; border-radius: 50%; display:inline; border:4px solid lavender; ">
			</div>

			{{-- img 2--}}
			{{-- <div class="form-group">
				<input name="slidepage_img2" type="file" accept="image/*" onchange="loadFiles2(event)"class="form-control inputbox_color input_shows2" placeholder="slidepage img...">
				<img id="slidepage_edit_img2"class="mb-3"src="" alt=""style="width:200px;height: 200px; border-radius: 50%; display:inline; border:4px solid lavender; ">

			</div> --}}
			{{-- img 3--}}
			{{-- <div class="form-group">
				<input name="slidepage_img3" type="file" accept="image/*" onchange="loadFiles3(event)"class="form-control inputbox_color" placeholder="slidepage img...">
				<img id="slidepage_edit_img3"class="mb-3"src="" alt=""style="width:200px;height: 200px; border-radius: 50%; display:inline; border:4px solid lavender; ">

			</div> --}}
		{{-- news--}}

			<div class="form-group">
				<div class="form-group">
				<input type="text" id="slidepage_edit_news"name="slidepage_news"class="form-control inputbox_color" placeholder="News ..."data-toggle="tooltip" data-placement="left" title="slide news">
			</div>
				
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="slidepage_url"id="slidepage_edit_url"class="form-control inputbox_color" type="text"  placeholder="url here..."data-toggle="tooltip" data-placement="left" title="slide url">
			</div>
			{{-- slug --}}
			<div class="form-group display_none">
				<input name="slidepage_slug"id="slidepage_edit_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="slidepage slug..."data-toggle="tooltip" data-placement="left" title="slide slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="slidepage_tag"id="slidepage_edit_tag"class="form-control inputbox_color" type="text" placeholder="slide tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="slidepage_popular" id="slidepage_edit_popular"type="checkbox"  class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"  @if(isset($edit_slidepage->slidepage_popular)?$edit_slidepage->slidepage_popular:'1') checked @else unchecked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="slidepage_status" id="slidepage_edit_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"@if(isset($edit_slidepage->slidepage_status)?$edit_slidepage->slidepage_status:'1') checked @else unchecked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="slidepage_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				<input class="btn btn-success" type="submit" name="submit"></input>
			</div>
		</form>
	</div>


	<div class="col-sm-12 col-md-6">
		<label class=" font-weight-bold text-white form-control bg-success text-center"><span id="show_news">Show News</span> </label>
		<div class="container card card-body border-light">
			<div class="col-12">
				<img id="slidepage_img1"class="mb-3"src="" alt="" style="width:200px;height: 200px; border-radius: 50%; display:inline; border:4px solid lavender; ">{{-- <img id="slidepage_img2"class="mb-3"src="" alt=""style="width:200px;height: 200px; border-radius: 50%;display:inline; border:4px solid lavender;"> --}}

			</div>
			{{-- <div class="col-12">	<img id="slidepage_img3"class="mb-3"src="" alt=""style="width:200px;height: 200px; border-radius: 50%;display:inline; border:4px solid lavender;">
				<img id="slidepage_img4"class="mb-3"src="" alt=""style="width:200px;height: 200px; border-radius: 50%;display:inline; border:4px solid lavender;">
			</div> --}}



			<h4 id="slidepage_title"class="text-capitalize mb-2"></h4>
			<P id="slidepage_text"></P>
			<blockquote class="font-italic" >
				<p id="slidepage_news">- </p>
			</blockquote>
			<i id="slidepage_future_post" class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"></i>

			<div class="card card-footer">
				<span><i id="slidepage_tag" class="icon-copy fa fa-tags text-capitalize font-weight-bold" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("img#slidepage_img1,img#slidepage_img2,img#slidepage_img3,img#slidepage_img4").hide();
		$('#show_news').click(function(){
			$("img#slidepage_img1,img#slidepage_img2,img#slidepage_img3,img#slidepage_img4").show();
			$.ajax({
				url: '/admin/get_slidepage',
				type: 'GET',
				dataType: 'json',
           success: function(response){ // What to do if we succeed
           	$('#slidepage_title').append(response.slidepage_title);
           	$('#slidepage_text').append(response.slidepage_text);
           	$('#slidepage_tag').append(' '+response.slidepage_tag);
           	$('#slidepage_news').append(' '+response.slidepage_news);
           	$('#slidepage_future_post').append(' '+response.slidepage_future_post);
           	$("img#slidepage_img1").attr('src' , '/image/admin/slidepage/'+response.slidepage_img1);
           	$("img#slidepage_img2").attr('src' , '/image/admin/slidepage/'+response.slidepage_img2);
           	$("img#slidepage_img3").attr('src' , '/image/admin/slidepage/'+response.slidepage_img3);
           

           	$('#slidepage_edit_title').val(response.slidepage_title);
           	$('#slidepage_edit_text').val(response.slidepage_text);
           	$('#slidepage_edit_url').val(response.slidepage_url);
           	$('#slidepage_edit_tag').val(response.slidepage_tag);
           	$('#slidepage_edit_status').val(response.slidepage_status);
           	$('#slidepage_edit_news').val(response.slidepage_news);
           	$('#slidepage_edit_slug').val(response.slidepage_slug);

           	$('#filter-date1').val(response.slidepage_future_post);
           	$("img#slidepage_edit_img1").attr('src' , '/image/admin/slidepage/'+response.slidepage_img1);
           	$("img#slidepage_edit_img2").attr('src' , '/image/admin/slidepage/'+response.slidepage_img2);
           	$("img#slidepage_edit_img3").attr('src' , '/image/admin/slidepage/'+response.slidepage_img3);
           	
        // $('#slidepage_img').append('image/admin/slidepage/'.response.slidepage_img);
         // console.log(response.slidepage_img);
     },
     error: function(response){
     	console.log('errror')
     	alert('Error'+response);
     }
 });
		});



       // slug
       $(function(){
       	$('#url').friendurl({id : 'slug', divider: '_'});
       }); $(function(){
       	$('#slidepage_edit_url').friendurl({id : 'slidepage_edit_slug', divider: '_'});
       });

   });

	// selected image view
	var loadFile1 = function(event) {
		var reader1 = new FileReader();
		reader1.onload = function(){
			var output1 = document.getElementById('output1');
			output1.src = reader1.result;
		};
		reader1.readAsDataURL(event.target.files[0]);
	};
	var loadFile2 = function(event) {
		var reader2 = new FileReader();
		reader2.onload = function(){
			var output2 = document.getElementById('output2');
			output2.src = reader2.result;
		};
		reader2.readAsDataURL(event.target.files[0]);
	};	var loadFile3 = function(event) {
		var reader3 = new FileReader();
		reader3.onload = function(){
			var output3 = document.getElementById('output3');
			output3.src = reader3.result;
		};
		reader3.readAsDataURL(event.target.files[0]);
	};
	var loadFile4 = function(event) {
		var reader4 = new FileReader();
		reader4.onload = function(){
			var output4 = document.getElementById('output4');
			output4.src = reader4.result;
		};
		reader4.readAsDataURL(event.target.files[0]);
	};
	// selected image view
	var loadFiles1 = function(event) {
		var readers1 = new FileReader();
		readers1.onload = function(){
			var output1 = document.getElementById('slidepage_edit_img1');
			output1.src = readers1.result;
		};
		readers1.readAsDataURL(event.target.files[0]);
	};
	// selected image view
	var loadFiles2 = function(event) {
		var readers2 = new FileReader();
		readers2.onload = function(){
			var output2 = document.getElementById('slidepage_edit_img2');
			output2.src = readers2.result;
		};
		readers2.readAsDataURL(event.target.files[0]);
	};
	// selected image view
	var loadFiles3 = function(event) {
		var readers3 = new FileReader();
		readers3.onload = function(){
			var output3 = document.getElementById('slidepage_edit_img3');
			output3.src = readers3.result;
		};
		readers3.readAsDataURL(event.target.files[0]);
	};
	// selected image view
	var loadFiles4 = function(event) {
		var readers4 = new FileReader();
		readers4.onload = function(){
			var output4 = document.getElementById('slidepage_edit_img4');
			output4.src = readers4.result;
		};
		readers4.readAsDataURL(event.target.files[0]);
	};




	// click on input file that time show image
	$('#output1,#output2,#output3,#output4').hide();
	$('.input_show1').focus(function(){
		$('#output1').show();
	});
	$('.input_show2').focus(function(){
		$('#output2').show();
	});
	$('.input_show3').focus(function(){
		$('#output3').show();
	});
	$('.input_show4').focus(function(){
		$('#output4').show();
	});


// edit section
$('#slidepage_edit_img1,#slidepage_edit_img2,#slidepage_edit_img3,#slidepage_edit_img4').hide();
$('#show_news').click(function(){
	
	$('#slidepage_edit_img1').show();


// 	$('#slidepage_edit_img2').show();


// 	$('#slidepage_edit_img3').show();
// $('#slidepage_edit_img4').show();

});		
</script>

@endsection