@extends('back.layout')
@section('create_visa')
@section('breadcrumb')
Create
@endsection
<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="/admin/create_visa" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Create Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="visa_title"class="form-control inputbox_color" type="text" placeholder="visa Title..."data-toggle="tooltip" data-placement="left" title="visa Title">
			</div>
			{{-- visa --}}
			<div class="form-group">
				<textarea name="visa_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="visa here..."data-toggle="tooltip" data-placement="left" title="Type visa"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile(event)" name="visa_img"class="form-control inputbox_color" placeholder="visa img...">
				<img id="output"/>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="visa_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="visa url" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="visa_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="visa slug..."data-toggle="tooltip" data-placement="left" title="visa slug"id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="visa_tag"class="form-control inputbox_color" type="text" placeholder="visa tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="visa_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" >
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="visa_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" >
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="visa_future_post"  id="filter-date" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success"class="btn btn-success">Success</button>
			</div>
		</form>
		{{-- Edit post --}}
		@if(isset($edit_visa->id)) 
		<form action="{{route('/update_visa',['id'=>$edit_visa->id])}}" method="POST" enctype="multipart/form-data">
		 @endif	@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Edit Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="visa_title" id="visa_edit_title" class="form-control inputbox_color" type="text"  placeholder="visa Title..."data-toggle="tooltip" data-placement="left" title="visa Title">
			</div>
			{{-- visa --}}
			<div class="form-group">
				<textarea name="visa_text"id="visa_edit_text"class="edit_editors form-control inputbox_color " type="text" placeholder="visa here..."data-toggle="tooltip" data-placement="left" title="Type visa"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<input name="visa_img" type="file" accept="image/*" onchange="loadFiles(event)"class="form-control inputbox_color" placeholder="visa img...">
				<img id="visa_edit_img"class="mb-3"src="" alt="">
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="visa_url"id="visa_edit_url"class="form-control inputbox_color" type="text"  placeholder="url here..."data-toggle="tooltip" data-placement="left" title="visa url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="visa_slug"id="visa_edit_slug"class="form-control inputbox_color text-lowercase" type="textplaceholder="visa slug..."data-toggle="tooltip" data-placement="left" title="visa slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="visa_tag"id="visa_edit_tag"class="form-control inputbox_color" type="text" placeholder="visa tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="visa_popular" id="visa_edit_popular"type="checkbox"  class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"  @if(isset($edit_visa->visa_popular)?$edit_visa->visa_popular:'1') checked @else unchecked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="visa_status" id="visa_edit_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"@if(isset($edit_visa->visa_status)?$edit_visa->visa_status:'1') checked @else unchecked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="visa_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
				<div class="form-group">
				<input class="btn btn-success" type="submit" name="submit"></input>
			</div>
		</form>
	</div>


	<div class="col-sm-12 col-md-6">
		<label class=" font-weight-bold text-white form-control bg-success text-center"><span id="show_news">Show News</span> </label>
		<div class="container card card-body border-light">
			<img id="visa_img"class="mb-3"src="" alt="">
			<h4 id="visa_title"class="text-capitalize mb-2"></h4>
			<P id="visa_text"></P>

			<i id="visa_future_post" class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"></i>
			
			<div class="card card-footer">
				<span><i id="visa_tag" class="icon-copy fa fa-tags text-capitalize font-weight-bold" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#show_news').click(function(){

			$.ajax({
				url: '/admin/get_visa',
				type: 'GET',
				dataType: 'json',
           success: function(response){ // What to do if we succeed
           	$('#visa_title').append(response.visa_title);
           	$('#visa_text').append(response.visa_text);
           	$('#visa_tag').append(' '+response.visa_tag);
           	$('#visa_future_post').append(' '+response.visa_future_post);
           	$("img#visa_img").attr('src' , '/image/admin/visa/'+response.visa_img);

           	$('#visa_edit_title').val(response.visa_title);
           	$('#visa_edit_text').val(response.visa_text);
           	$('#visa_edit_url').val(response.visa_url);
           	$('#visa_edit_tag').val(response.visa_tag);
           	$('#visa_edit_status').val(response.visa_status);
           	$('#visa_edit_slug').val(response.visa_slug);

           	$('#filter-date1').val(response.visa_future_post);
           	$("img#visa_edit_img").attr('src' , '/image/admin/visa/'+response.visa_img);
        // $('#visa_img').append('image/admin/visa/'.response.visa_img);
         // console.log(response.visa_img);
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
       	$('#visa_edit_url').friendurl({id : 'visa_edit_slug', divider: '_'});
       });

   });



	// selected image view
	var loadFile = function(event) {
		var reader = new FileReader();
		reader.onload = function(){
			var output = document.getElementById('output');
			output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
	};
	// selected image view
	var loadFiles = function(event) {
		var reader = new FileReader();
		reader.onload = function(){
			var output = document.getElementById('visa_edit_img');
			output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
	};
	$('.edit_editors').wysihtml5();
	 
</script>

@endsection