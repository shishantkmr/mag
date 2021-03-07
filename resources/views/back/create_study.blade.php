@extends('back.layout')
@section('create_study')
@section('breadcrumb')
Create
@endsection
<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="create_study" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Create Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="study_title"class="form-control inputbox_color" type="text" placeholder="study Title..."data-toggle="tooltip" data-placement="left" title="study Title">
			</div>
			{{-- study --}}
			<div class="form-group">
				<textarea name="study_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="study here..."data-toggle="tooltip" data-placement="left" title="Type study"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile(event)" name="study_img"class="form-control inputbox_color" placeholder="visa img...">
				<img id="output"/>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="study_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="study url" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="study_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="study slug..."data-toggle="tooltip" data-placement="left" title="study slug" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="study_tag"class="form-control inputbox_color" type="text" placeholder="study tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="study_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="study_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="study_future_post"  id="filter-date" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success"class="btn btn-success">Success</button>
			</div>
		</form>
		{{-- Edit post --}}
		@if(isset($edit_study->id))
		<form action=" {{route('admin/update_study',['id'=>$edit_study->id])}}" method="POST" enctype="multipart/form-data">
			@endif @csrf
			<label class=" font-weight-bold text-white form-control bg-success">Edit Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="study_title" id="study_edit_title" class="form-control inputbox_color" type="text"  placeholder="study Title..."data-toggle="tooltip" data-placement="left" title="study Title">
			</div>
			{{-- study --}}
			<div class="form-group">
				<textarea name="study_text"id="study_edit_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="study here..."data-toggle="tooltip" data-placement="left" title="Type study"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFiles(event)" name="study_img"class="form-control inputbox_color" placeholder="visa img...">
				<img id="study_edit_img"/>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="study_url"id="study_edit_url"class="form-control inputbox_color" type="text"  placeholder="url here..."data-toggle="tooltip" data-placement="left" title="study url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="study_slug"id="study_edit_slug"class="form-control inputbox_color text-lowercase" type="textplaceholder="study slug..."data-toggle="tooltip" data-placement="left" title="study slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="study_tag"id="study_edit_tag"class="form-control inputbox_color" type="text" placeholder="study tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="study_popular" id="study_edit_popular"type="checkbox"  class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1" @if(isset($edit_study->study_popular) ? $edit_study->study_popular : '1') checked @else unchecked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="study_status" id="study_edit_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"value="1" @if(isset($edit_study->study_status) ? $edit_study->study_status : '1') checked @else unchecked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="study_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success1"class="btn btn-success">Update</button>
			</div>
		</form>
	</div>


	<div class="col-sm-12 col-md-6">
		<label class=" font-weight-bold text-white form-control bg-success text-center"><span id="show_study">Show News</span> </label>
		<div class="container card card-body border-light">
			<img id="study_img"class="mb-3"src="" alt="">
			<h4 id="study_title"class="text-capitalize mb-2"></h4>
			<P id="study_text"></P>

			<i id="study_future_post" class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"></i>
			
			<div class="card card-footer">
				<span><i id="study_tag" class="icon-copy fa fa-tags text-capitalize font-weight-bold" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#show_study').click(function(){

		$.ajax({
			url: '/admin/get_study',
			type: 'GET',
			dataType: 'json',
           success: function(response){ // What to do if we succeed
        $('#study_title').append(response.study_title);
        $('#study_text').append(response.study_text);
        $('#study_tag').append(' '+response.study_tag);
        $('#study_future_post').append(' '+response.study_future_post);
        $("img#study_img").attr('src' , '/image/admin/study/'+response.study_img);

        $('#study_edit_title').val(response.study_title);
        $('#study_edit_text').val(response.study_text);
        $('#study_edit_url').val(response.study_url);
        $('#study_edit_tag').val(response.study_tag);
        $('#study_edit_status').val(response.study_status);
        $('#study_edit_slug').val(response.study_slug);
       
        $('#filter-date1').val(response.study_future_post);
        $("img#study_edit_img").attr('src' , '/image/admin/study/'+response.study_img);
        // $('#study_img').append('image/admin/study/'.response.study_img);
         // console.log(response.study_img);
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
       	$('#study_edit_url').friendurl({id : 'study_edit_slug', divider: '_'});
       });
</script>

@endsection