@extends('back.layout')
@section('create_politics')
@section('breadcrumb')
Create
@endsection
<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="/admin/create_politics" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Create Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="politics_title"class="form-control inputbox_color" type="text" placeholder="politics Title..."data-toggle="tooltip" data-placement="left" title="politics Title">
			</div>
			{{-- politics --}}
			<div class="form-group">	<textarea  name="politics_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="politics here..."data-toggle="tooltip" data-placement="left" title="Type politics"></textarea>
				
			</div>
			{{-- img --}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile(event)" name="politics_img"class="form-control inputbox_color" placeholder="visa img...">
				<img id="output"/>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="politics_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="politics url" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group display_none">
				<input name="politics_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="politics slug..."data-toggle="tooltip" data-placement="left" title="politics slug" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="politics_tag"class="form-control inputbox_color" type="text" placeholder="politics tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="politics_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="politics_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="politics_future_post"  id="filter-date" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success"class="btn btn-success">Success</button>
			</div>
		</form>
		{{-- Edit post --}}
		
@if(isset($edit_politics->id))
		<form action="{{route('/update_politics',['id'=>$edit_politics->id])}}" method="POST" enctype="multipart/form-data">@endif
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Edit Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="politics_title" id="politics_edit_title" class="form-control inputbox_color" type="text"  placeholder="politics Title..."data-toggle="tooltip" data-placement="left" title="politics Title">
			</div>
			{{-- politics --}}
			<div class="form-group">
				<textarea name="politics_text"id="politics_edit_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="politics here..."data-toggle="tooltip" data-placement="left" title="Type politics"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<div class="form-group">
				<input name="politics_img" type="file" accept="image/*" onchange="loadFiles(event)"class="form-control inputbox_color" placeholder="politics img...">
				<img id="politics_edit_img"class="mb-3"src="" alt="">
			</div>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="politics_url"id="politics_edit_url"class="form-control inputbox_color" type="text"  placeholder="url here..."data-toggle="tooltip" data-placement="left" title="politics url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="politics_slug"id="politics_edit_slug"class="form-control inputbox_color text-lowercase" type="textplaceholder="politics slug..."data-toggle="tooltip" data-placement="left" title="politics slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="politics_tag"id="politics_edit_tag"class="form-control inputbox_color" type="text" placeholder="politics tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="politics_popular" id="politics_edit_popular"type="checkbox"  class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1" @if(isset($edit_politics->politics_popular) ? $edit_politics->politics_popular : '1') checked @else unchecked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="politics_status" id="politics_edit_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"value="1" @if(isset($edit_politics->politics_status) ? $edit_politics->politics_status : '1') checked @else unchecked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="politics_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success1"class="btn btn-success">Update</button>
			</div>
		</form>
	</div>


	<div class="col-sm-12 col-md-6">
		<label class=" font-weight-bold text-white form-control bg-success text-center"><span id="show_politics">Show News</span> </label>
		<div class="container card card-body border-light">
			<img id="politics_img"class="mb-3"src="" alt="">
			<h4 id="politics_title"class="text-capitalize mb-2"></h4>
			<P id="politics_text"></P>

			<i id="politics_future_post" class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"></i>
			
			<div class="card card-footer">
				<span><i id="politics_tag" class="icon-copy fa fa-tags text-capitalize font-weight-bold" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#show_politics').click(function(){

		$.ajax({
			url: '/admin/get_politics',
			type: 'GET',
			dataType: 'json',
           success: function(response){ // What to do if we succeed
        $('#politics_title').append(response.politics_title);
        $('#politics_text').append(response.politics_text);
        $('#politics_tag').append(' '+response.politics_tag);
        $('#politics_future_post').append(' '+response.politics_future_post);
        $("img#politics_img").attr('src' , '/image/admin/politics/'+response.politics_img);

        $('#politics_edit_title').val(response.politics_title);
        $('#politics_edit_text').val(response.politics_text);
        $('#politics_edit_url').val(response.politics_url);
        $('#politics_edit_tag').val(response.politics_tag);
        $('#politics_edit_status').val(response.politics_status);
        $('#politics_edit_slug').val(response.politics_slug);
       
        $('#filter-date1').val(response.politics_future_post);
        $("img#politics_edit_img").attr('src' , '/image/admin/politics/'+response.politics_img);
        // $('#politics_img').append('image/admin/politics/'.response.politics_img);
         // console.log(response.politics_img);
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
       	$('#politics_edit_url').friendurl({id : 'politics_edit_slug', divider: '_'});
       });
</script>

@endsection