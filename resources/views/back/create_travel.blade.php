@extends('back.layout')
@section('create_travel')
@section('breadcrumb')
Create
@endsection
<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="/admin/create_travel" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Create Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="travel_title"class="form-control inputbox_color" type="text" placeholder="travel Title..."data-toggle="tooltip" data-placement="left" title="travel Title">
			</div>
			{{-- travel --}}
			<div class="form-group">	<textarea  name="travel_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="travel here..."data-toggle="tooltip" data-placement="left" title="Type travel"></textarea>
				
			</div>
			{{-- img --}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile(event)" name="travel_img"class="form-control inputbox_color" placeholder="visa img...">
				<img id="output"/>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="travel_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="travel url" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group display_none">
				<input name="travel_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="travel slug..."data-toggle="tooltip" data-placement="left" title="travel slug" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="travel_tag"class="form-control inputbox_color" type="text" placeholder="travel tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="travel_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="travel_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="travel_future_post"  id="filter-date" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success"class="btn btn-success">Success</button>
			</div>
		</form>
		{{-- Edit post --}}
		
@if(isset($edit_travel->id))
		<form action="{{route('/update_travel',['id'=>$edit_travel->id])}}" method="POST" enctype="multipart/form-data">@endif
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Edit Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="travel_title" id="travel_edit_title" class="form-control inputbox_color" type="text"  placeholder="travel Title..."data-toggle="tooltip" data-placement="left" title="travel Title">
			</div>
			{{-- travel --}}
			<div class="form-group">
				<textarea name="travel_text"id="travel_edit_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="travel here..."data-toggle="tooltip" data-placement="left" title="Type travel"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<div class="form-group">
				<input name="travel_img" type="file" accept="image/*" onchange="loadFiles(event)"class="form-control inputbox_color" placeholder="travel img...">
				<img id="travel_edit_img"class="mb-3"src="" alt="">
			</div>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="travel_url"id="travel_edit_url"class="form-control inputbox_color" type="text"  placeholder="url here..."data-toggle="tooltip" data-placement="left" title="travel url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="travel_slug"id="travel_edit_slug"class="form-control inputbox_color text-lowercase" type="textplaceholder="travel slug..."data-toggle="tooltip" data-placement="left" title="travel slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="travel_tag"id="travel_edit_tag"class="form-control inputbox_color" type="text" placeholder="travel tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="travel_popular" id="travel_edit_popular"type="checkbox"  class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1" @if(isset($edit_travel->travel_popular) ? $edit_travel->travel_popular : '1') checked @else unchecked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="travel_status" id="travel_edit_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"value="1" @if(isset($edit_travel->travel_status) ? $edit_travel->travel_status : '1') checked @else unchecked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="travel_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success1"class="btn btn-success">Update</button>
			</div>
		</form>
	</div>


	<div class="col-sm-12 col-md-6">
		<label class=" font-weight-bold text-white form-control bg-success text-center"><span id="show_travel">Show News</span> </label>
		<div class="container card card-body border-light">
			<img id="travel_img"class="mb-3"src="" alt="">
			<h4 id="travel_title"class="text-capitalize mb-2"></h4>
			<P id="travel_text"></P>

			<i id="travel_future_post" class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"></i>
			
			<div class="card card-footer">
				<span><i id="travel_tag" class="icon-copy fa fa-tags text-capitalize font-weight-bold" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#show_travel').click(function(){

		$.ajax({
			url: '/admin/get_travel',
			type: 'GET',
			dataType: 'json',
           success: function(response){ // What to do if we succeed
        $('#travel_title').append(response.travel_title);
        $('#travel_text').append(response.travel_text);
        $('#travel_tag').append(' '+response.travel_tag);
        $('#travel_future_post').append(' '+response.travel_future_post);
        $("img#travel_img").attr('src' , '/image/admin/travel/'+response.travel_img);

        $('#travel_edit_title').val(response.travel_title);
        $('#travel_edit_text').val(response.travel_text);
        $('#travel_edit_url').val(response.travel_url);
        $('#travel_edit_tag').val(response.travel_tag);
        $('#travel_edit_status').val(response.travel_status);
        $('#travel_edit_slug').val(response.travel_slug);
       
        $('#filter-date1').val(response.travel_future_post);
        $("img#travel_edit_img").attr('src' , '/image/admin/travel/'+response.travel_img);
        // $('#travel_img').append('image/admin/travel/'.response.travel_img);
         // console.log(response.travel_img);
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
       	$('#travel_edit_url').friendurl({id : 'travel_edit_slug', divider: '_'});
       });
</script>

@endsection