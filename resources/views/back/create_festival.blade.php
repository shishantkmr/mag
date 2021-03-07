@extends('back.layout')
@section('create_festival')
@section('breadcrumb')
Create
@endsection
<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="/admin/create_festival" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Create Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="festival_title"class="form-control inputbox_color" type="text" placeholder="festival Title..."data-toggle="tooltip" data-placement="left" title="festival Title">
			</div>
			{{-- festival --}}
			<div class="form-group">
				<textarea name="festival_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="festival here..."data-toggle="tooltip" data-placement="left" title="Type festival"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<input type="file" accept="image/*" onchange="loadFile(event)" name="festival_img"class="form-control inputbox_color" placeholder="festival img...">
				<img id="output"/>
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="festival_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="festival url" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group display_none">
				<input name="festival_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="festival slug..."data-toggle="tooltip" data-placement="left" title="festival slug"id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="festival_tag"class="form-control inputbox_color" type="text" placeholder="festival tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="festival_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="festival_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1">
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="festival_future_post"  id="filter-date" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				
				<button type="submit" id ="success"class="btn btn-success">Success</button>
			</div>
		</form>
		{{-- Edit post --}}
		@if(isset($edit_festival->id))
		<form action="{{route('/update_festival',['id'=>$edit_festival->id])}} " method="POST" enctype="multipart/form-data"> @endif
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Edit Post </label>
			{{-- title --}}
			<div class="form-group">
				<input name="festival_title" id="festival_edit_title" class="form-control inputbox_color" type="text"  placeholder="festival Title..."data-toggle="tooltip" data-placement="left" title="festival Title">
			</div>
			{{-- festival --}}
			<div class="form-group">
				<textarea name="festival_text"id="festival_edit_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="festival here..."data-toggle="tooltip" data-placement="left" title="Type festival"></textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<input name="festival_img" type="file" accept="image/*" onchange="loadFiles(event)"class="form-control inputbox_color" placeholder="festival img...">
				<img id="festival_edit_img"class="mb-3"src="" alt="">
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="festival_url"id="festival_edit_url"class="form-control inputbox_color" type="text"  placeholder="url here..."data-toggle="tooltip" data-placement="left" title="festival url">
			</div>
			{{-- slug --}}
			<div class="form-group display_none">
				<input name="festival_slug"id="festival_edit_slug"class="form-control inputbox_color text-lowercase" type="textplaceholder="festival slug..."data-toggle="tooltip" data-placement="left" title="festival slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="festival_tag"id="festival_edit_tag"class="form-control inputbox_color" type="text" placeholder="festival tag..."data-toggle="tooltip" data-placement="left" title="#tag">
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="festival_popular" id="festival_edit_popular"type="checkbox"  class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" value="1" @if(isset($edit_festival->festival_popular)?$edit_festival->festival_popular:'1') checked @else unchecked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="festival_status" id="festival_edit_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"value="1"@if(isset($edit_festival->festival_status)?$edit_festival->festival_status:'1') checked @else unchecked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="festival_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
			</div>
			<div class="form-group">
				<input class="btn btn-success" type="submit" name="submit"></input>
			</div>
		</form>
	</div>


	<div class="col-sm-12 col-md-6">
		<label class=" font-weight-bold text-white form-control bg-success text-center"><span id="show_news">Show News</span> </label>
		<div class="container card card-body border-light">
			<img id="festival_img"class="mb-3"src="" alt="">
			<h4 id="festival_title"class="text-capitalize mb-2"></h4>
			<P id="festival_text"></P>

			<i id="festival_future_post" class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"></i>
			
			<div class="card card-footer">
				<span><i id="festival_tag" class="icon-copy fa fa-tags text-capitalize font-weight-bold" aria-hidden="true"></i></span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#show_news').click(function(){

			$.ajax({
				url: '/admin/get_festival',
				type: 'GET',
				dataType: 'json',
           success: function(response){ // What to do if we succeed
           	$('#festival_title').append(response.festival_title);
           	$('#festival_text').append(response.festival_text);
           	$('#festival_tag').append(' '+response.festival_tag);
           	$('#festival_future_post').append(' '+response.festival_future_post);
           	$("img#festival_img").attr('src' , '/image/admin/festival/'+response.festival_img);

           	$('#festival_edit_title').val(response.festival_title);
           	$('#festival_edit_text').val(response.festival_text);
           	$('#festival_edit_url').val(response.festival_url);
           	$('#festival_edit_tag').val(response.festival_tag);
           	$('#festival_edit_status').val(response.festival_status);
           	$('#festival_edit_slug').val(response.festival_slug);

           	$('#filter-date1').val(response.festival_future_post);
           	$("img#festival_edit_img").attr('src' , '/image/admin/festival/'+response.festival_img);
        // $('#festival_img').append('image/admin/festival/'.response.festival_img);
         // console.log(response.festival_img);
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
       	$('#festival_edit_url').friendurl({id : 'festival_edit_slug', divider: '_'});
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
			var output = document.getElementById('festival_edit_img');
			output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
	};
</script>

@endsection