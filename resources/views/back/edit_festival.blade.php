@extends('back.layout')
@section('edit_festival')
@section('breadcrumb')
Edit
@endsection
	

			<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="{{ route('/update_festival',['id'=>$edit_festival->id]) }}" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Update Post <span class="float-lg-right"><a href="admin/listed_festival" class="text-white"title="">Listed</a></span></label>
			{{-- title --}}
			<div class="form-group">
				<input name="festival_title"class="form-control inputbox_color" type="text" placeholder="festival Title..."data-toggle="tooltip" data-placement="left" title="festival Title" value="{{$edit_festival->festival_title}}">
			</div>
			{{-- festival --}}
			<div class="form-group">
				<textarea name="festival_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="festival here..."data-toggle="tooltip" data-placement="left" title="Type festival">{{$edit_festival->festival_text}}</textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<img class="img-thumbnail border-success" src="{{asset('image/admin/festival/'.$edit_festival->festival_img)}}" alt="">
				<input name="festival_img"class="form-control inputbox_color" type="file" placeholder="festival img...">
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="festival_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="festival url"value="{{$edit_festival->festival_url}}" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="festival_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="festival slug..."data-toggle="tooltip" data-placement="left" title="festival slug"value="{{$edit_festival->festival_slug}}" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="festival_tag"class="form-control inputbox_color" type="text" placeholder="festival tag..."data-toggle="tooltip" data-placement="left" title="#tag"value="{{$edit_festival->festival_tag}}" >
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="festival_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" @if($edit_festival->festival_popular==0) unchecked @else checked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="festival_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"@if($edit_festival->festival_status==0) unchecked @else checked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="festival_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" value="{{$edit_festival->festival_future_post}}" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
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
			<img id="festival_img"class="mb-3"src="{{asset('image/admin/festival/'.$edit_festival->festival_img)}}" alt="">
			<h4 id="festival_title"class="text-capitalize mb-2">{{$edit_festival->festival_title}}</h4>
			<P>{{$edit_festival->festival_text}}</P>
		
				<i class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"> {{$edit_festival->festival_future_post}}</i>
			
			<div class="card card-footer">
				<span><i class="icon-copy fa fa-tags" aria-hidden="true"> {{$edit_festival->festival_tag}}</i></span>
			</div>
		</div>
	</div>
</div>
	<script>
		 $(function(){
       	$('#url').friendurl({id : 'slug', divider: '_'});
       });
	</script>		
@endsection