@extends('back.layout')
@section('create_breakingnews')
@section('breadcrumb')
Create
@endsection
<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="/admin/create_breakingnews" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Create Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="breakingnews_title"class="form-control inputbox_color" type="text" placeholder="breakingnews Title..."data-toggle="tooltip" data-placement="left" title="breakingnews Title">
			</div>
			{{-- breakingnews --}}
			<div class="form-group">	
				<textarea  name="breakingnews_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="breakingnews here..."data-toggle="tooltip" data-placement="left" title="Type breakingnews">
				</textarea>
				
			</div>
			{{-- img --}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile(event)" name="breakingnews_img"class="form-control inputbox_color" placeholder="visa img...">
				<img id="output"/>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="breakingnews_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="breakingnews url" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group display_none">
				<input name="breakingnews_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="breakingnews slug..."data-toggle="tooltip" data-placement="left" title="breakingnews slug" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="breakingnews_tag"class="form-control inputbox_color" type="text" placeholder="breakingnews tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="breakingnews_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="breakingnews_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="breakingnews_future_post"  id="filter-date" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success"class="btn btn-success">Success</button>
			</div>
		</form>
		{{-- Edit post --}}
		
		@if(isset($edit_breakingnews->id))
		<form action="{{route('/update_breakingnews',['id'=>$edit_breakingnews->id])}}" method="POST" enctype="multipart/form-data">@endif
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Edit Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="breakingnews_title" id="breakingnews_edit_title" class="form-control inputbox_color" type="text"  placeholder="breakingnews Title..."data-toggle="tooltip" data-placement="left" title="breakingnews Title">
			</div>
			{{-- breakingnews --}}
			<div class="form-group">
				<textarea name="breakingnews_text"id="breakingnews_edit_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="breakingnews here..."data-toggle="tooltip" data-placement="left" title="Type breakingnews"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<div class="form-group">
					<input name="breakingnews_img" type="file" accept="image/*" onchange="loadFiles(event)"class="form-control inputbox_color" placeholder="breakingnews img...">
					<img id="breakingnews_edit_img"class="mb-3"src="" alt="">
				</div>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="breakingnews_url"id="breakingnews_edit_url"class="form-control inputbox_color" type="text"  placeholder="url here..."data-toggle="tooltip" data-placement="left" title="breakingnews url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="breakingnews_slug"id="breakingnews_edit_slug"class="form-control inputbox_color text-lowercase" type="textplaceholder="breakingnews slug..."data-toggle="tooltip" data-placement="left" title="breakingnews slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="breakingnews_tag"id="breakingnews_edit_tag"class="form-control inputbox_color" type="text" placeholder="breakingnews tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="breakingnews_popular" id="breakingnews_edit_popular"type="checkbox"  class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1" @if(isset($edit_breakingnews->breakingnews_popular) ? $edit_breakingnews->breakingnews_popular : '1') checked @else unchecked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="breakingnews_status" id="breakingnews_edit_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"value="1" @if(isset($edit_breakingnews->breakingnews_status) ? $edit_breakingnews->breakingnews_status : '1') checked @else unchecked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="breakingnews_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success1"class="btn btn-success">Update</button>
			</div>
		</form>
	</div>


	<div class="col-sm-12 col-md-6">
		<label class=" font-weight-bold text-white form-control bg-success text-center"><span id="show_breakingnews">Show News</span> </label>
		<div class="container card card-body border-light">
			<img id="breakingnews_img"class="mb-3"src="" alt="">
			<h4 id="breakingnews_title"class="text-capitalize mb-2"></h4>
			<P id="breakingnews_text"></P>

			<i id="breakingnews_future_post" class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"></i>
			
			<div class="card card-footer">
				<span><i id="breakingnews_tag" class="icon-copy fa fa-tags text-capitalize font-weight-bold" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#show_breakingnews').click(function(){

			$.ajax({
				url: '/admin/get_breakingnews',
				type: 'GET',
				dataType: 'json',
           success: function(response){ // What to do if we succeed
           	$('#breakingnews_title').append(response.breakingnews_title);
           	$('#breakingnews_text').append(response.breakingnews_text);
           	$('#breakingnews_tag').append(' '+response.breakingnews_tag);
           	$('#breakingnews_future_post').append(' '+response.breakingnews_future_post);
           	$("img#breakingnews_img").attr('src' , '/image/admin/breakingnews/'+response.breakingnews_img);

           	$('#breakingnews_edit_title').val(response.breakingnews_title);
           	$('#breakingnews_edit_text').val(response.breakingnews_text);
           	$('#breakingnews_edit_url').val(response.breakingnews_url);
           	$('#breakingnews_edit_tag').val(response.breakingnews_tag);
           	$('#breakingnews_edit_status').val(response.breakingnews_status);
           	$('#breakingnews_edit_slug').val(response.breakingnews_slug);
           	
           	$('#filter-date1').val(response.breakingnews_future_post);
           	$("img#breakingnews_edit_img").attr('src' , '/image/admin/breakingnews/'+response.breakingnews_img);
        // $('#breakingnews_img').append('image/admin/breakingnews/'.response.breakingnews_img);
         // console.log(response.breakingnews_img);
     },
     error: function(response){
     	console.log('errror')
     	alert('Error'+response);
     }
 });
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
			var output = document.getElementById('outputs');
			output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
	};
  // slug
  $(function(){
  	$('#url').friendurl({id : 'slug', divider: '_'});
  }); $(function(){
  	$('#breakingnews_edit_url').friendurl({id : 'breakingnews_edit_slug', divider: '_'});
  });
</script>

@endsection