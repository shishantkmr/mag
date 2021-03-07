@extends('back.layout')
@section('edit_slidepage')
@section('breadcrumb')
Edit
@endsection
	

			<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="{{ route('/update_slidepage',['id'=>$edit_slidepage->id]) }}" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Update Post <span class="float-lg-right"><a href="/listed_slidepage" class="text-white"title="">Listed</a></span></label>
			{{-- title --}}
			<div class="form-group">
				<input name="slidepage_title"class="form-control inputbox_color" type="text" placeholder="slidepage Title..."data-toggle="tooltip" data-placement="left" title="slidepage Title" value="{{$edit_slidepage->slidepage_title}}">
			</div>
			{{-- slidepage --}}
			<div class="form-group">
				<textarea name="slidepage_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="slidepage here..."data-toggle="tooltip" data-placement="left" title="Type slidepage">{{$edit_slidepage->slidepage_text}}</textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile1(event)" name="slidepage_img"class="form-control inputbox_color input_show1" placeholder="slidepage img...">
				<img id="output1"/ style="width:200px;height: 200px; border-radius: 50%; display:inline; border:4px solid lavender; ">

				<img class="img-thumbnail border-success" src="{{asset('image/admin/slidepage/'.$edit_slidepage->slidepage_img1)}}" alt="" id="img">
				
			</div>
			{{-- news--}}

			<div class="form-group">
				<div class="form-group">
				<input type="text" id="slidepage_edit_news"name="slidepage_news"class="form-control inputbox_color" placeholder="News ..."data-toggle="tooltip" data-placement="left" title="slide news"value="{{$edit_slidepage->slidepage_news}}">
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="slidepage_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="slidepage url"value="{{$edit_slidepage->slidepage_url}}" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group display_none">
				<input name="slidepage_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="slidepage slug..."data-toggle="tooltip" data-placement="left" title="slidepage slug"value="{{$edit_slidepage->slidepage_slug}}" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="slidepage_tag"class="form-control inputbox_color" type="text" placeholder="slidepage tag..."data-toggle="tooltip" data-placement="left" title="#tag"value="{{$edit_slidepage->slidepage_tag}}">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="slidepage_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" @if($edit_slidepage->slidepage_popular==0) unchecked @else checked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="slidepage_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" @if($edit_slidepage->slidepage_status==0) unchecked @else checked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="slidepage_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" value="{{$edit_slidepage->slidepage_future_post}}" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" class="btn btn-success">Update</button>
			</div>
		</form>
		{{-- Edit post --}}
	
	</div>


	<div class="col-sm-12 col-md-6">
		<label class=" font-weight-bold text-white form-control bg-success text-center"><span >Review News</span> </label>
		<div class="container card card-body border-light">
			<img id="slidepage_img"class="mb-3"src="{{asset('image/admin/slidepage/'.$edit_slidepage->slidepage_img)}}" alt="">
			<h4 id="slidepage_title"class="text-capitalize mb-2">{{$edit_slidepage->slidepage_title}}</h4>
			<P>{{$edit_slidepage->slidepage_text}}</P>
		
				<i class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"> {{$edit_slidepage->slidepage_future_post}}</i>
			
			<div class="card card-footer">
				<span><i class="icon-copy fa fa-tags" aria-hidden="true"> {{$edit_slidepage->slidepage_tag}}</i></span>
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
       	$('#url').friendurl({id : 'slug', divider: '_'});
       });
	var loadFile1 = function(event) {
		var reader1 = new FileReader();
		reader1.onload = function(){
			var output1 = document.getElementById('output1');
			output1.src = reader1.result;
		};
		reader1.readAsDataURL(event.target.files[0]);
	};

	// click on input file that time show image
	$('#output1').hide();
	$('.input_show1').focus(function(){
		$('#output1').show();
		$('#img').hide();
	});
</script>
			
@endsection