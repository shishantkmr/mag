@extends('back.layout')
@section('create_technology')
@section('breadcrumb')
Create
@endsection
<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="/admin/create_technology" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Create Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="technology_title"class="form-control inputbox_color" type="text" placeholder="technology Title..."data-toggle="tooltip" data-placement="left" title="technology Title">
			</div>
			{{-- technology --}}
			<div class="form-group">	<textarea  name="technology_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="technology here..."data-toggle="tooltip" data-placement="left" title="Type technology"></textarea>
				
			</div>
			{{-- img --}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile(event)" name="technology_img"class="form-control inputbox_color" placeholder="visa img...">
				<img id="output"/>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="technology_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="technology url" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group display_none">
				<input name="technology_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="technology slug..."data-toggle="tooltip" data-placement="left" title="technology slug" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="technology_tag"class="form-control inputbox_color" type="text" placeholder="technology tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="technology_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="technology_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="technology_future_post"  id="filter-date" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success"class="btn btn-success">Success</button>
			</div>
		</form>
		{{-- Edit post --}}
		
@if(isset($edit_technology->id))
		<form action="{{route('/update_technology',['id'=>$edit_technology->id])}}" method="POST" enctype="multipart/form-data">@endif
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Edit Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="technology_title" id="technology_edit_title" class="form-control inputbox_color" type="text"  placeholder="technology Title..."data-toggle="tooltip" data-placement="left" title="technology Title">
			</div>
			{{-- technology --}}
			<div class="form-group">
				<textarea name="technology_text"id="technology_edit_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="technology here..."data-toggle="tooltip" data-placement="left" title="Type technology"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<div class="form-group">
				<input name="technology_img" type="file" accept="image/*" onchange="loadFiles(event)"class="form-control inputbox_color" placeholder="technology img...">
				<img id="technology_edit_img"class="mb-3"src="" alt="">
			</div>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="technology_url"id="technology_edit_url"class="form-control inputbox_color" type="text"  placeholder="url here..."data-toggle="tooltip" data-placement="left" title="technology url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="technology_slug"id="technology_edit_slug"class="form-control inputbox_color text-lowercase" type="textplaceholder="technology slug..."data-toggle="tooltip" data-placement="left" title="technology slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="technology_tag"id="technology_edit_tag"class="form-control inputbox_color" type="text" placeholder="technology tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="technology_popular" id="technology_edit_popular"type="checkbox"  class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1" @if(isset($edit_technology->technology_popular) ? $edit_technology->technology_popular : '1') checked @else unchecked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="technology_status" id="technology_edit_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"value="1" @if(isset($edit_technology->technology_status) ? $edit_technology->technology_status : '1') checked @else unchecked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="technology_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success1"class="btn btn-success">Update</button>
			</div>
		</form>
	</div>


	<div class="col-sm-12 col-md-6">
		<label class=" font-weight-bold text-white form-control bg-success text-center"><span id="show_technology">Show News</span> </label>
		<div class="container card card-body border-light">
			<img id="technology_img"class="mb-3"src="" alt="">
			<h4 id="technology_title"class="text-capitalize mb-2"></h4>
			<P id="technology_text"></P>

			<i id="technology_future_post" class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"></i>
			
			<div class="card card-footer">
				<span><i id="technology_tag" class="icon-copy fa fa-tags text-capitalize font-weight-bold" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#show_technology').click(function(){

		$.ajax({
			url: '/admin/get_technology',
			type: 'GET',
			dataType: 'json',
           success: function(response){ // What to do if we succeed
        $('#technology_title').append(response.technology_title);
        $('#technology_text').append(response.technology_text);
        $('#technology_tag').append(' '+response.technology_tag);
        $('#technology_future_post').append(' '+response.technology_future_post);
        $("img#technology_img").attr('src' , '/image/admin/technology/'+response.technology_img);

        $('#technology_edit_title').val(response.technology_title);
        $('#technology_edit_text').val(response.technology_text);
        $('#technology_edit_url').val(response.technology_url);
        $('#technology_edit_tag').val(response.technology_tag);
        $('#technology_edit_status').val(response.technology_status);
        $('#technology_edit_slug').val(response.technology_slug);
       
        $('#filter-date1').val(response.technology_future_post);
        $("img#technology_edit_img").attr('src' , '/image/admin/technology/'+response.technology_img);
        // $('#technology_img').append('image/admin/technology/'.response.technology_img);
         // console.log(response.technology_img);
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
       	$('#technology_edit_url').friendurl({id : 'technology_edit_slug', divider: '_'});
       });
</script>

@endsection