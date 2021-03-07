@extends('back.layout')
@section('edit_technology')
@section('breadcrumb')
Edit
@endsection
	

			<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="{{ route('/update_technology',['id'=>$edit_technology->id]) }}" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Update Post <span class="float-lg-right"><a href="admin/listed_technology" class="text-white"title="">Listed</a></span></label>
			{{-- title --}}
			<div class="form-group">
				<input name="technology_title"class="form-control inputbox_color" type="text" placeholder="technology Title..."data-toggle="tooltip" data-placement="left" title="technology Title" value="{{$edit_technology->technology_title}}">
			</div>
			{{-- technology --}}
			<div class="form-group">
				<textarea name="technology_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="technology here..."data-toggle="tooltip" data-placement="left" title="Type technology">{{$edit_technology->technology_text}}</textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<img class="img-thumbnail border-success" src="{{asset('image/admin/technology/'.$edit_technology->technology_img)}}" alt="">
				<input name="technology_img"class="form-control inputbox_color" type="file" placeholder="technology img...">
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="technology_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="technology url"value="{{$edit_technology->technology_url}}" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="technology_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="technology slug..."data-toggle="tooltip" data-placement="left" title="technology slug"value="{{$edit_technology->technology_slug}}" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="technology_tag"class="form-control inputbox_color" type="text" placeholder="technology tag..."data-toggle="tooltip" data-placement="left" title="#tag"value="{{$edit_technology->technology_tag}}" >
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="technology_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" @if($edit_technology->technology_popular==0) unchecked @else checked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="technology_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"@if($edit_technology->technology_status==0) unchecked @else checked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="technology_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" value="{{$edit_technology->technology_future_post}}" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
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
			<img id="technology_img"class="mb-3"src="{{asset('image/admin/technology/'.$edit_technology->technology_img)}}" alt="">
			<h4 id="technology_title"class="text-capitalize mb-2">{{$edit_technology->technology_title}}</h4>
			<P>{{$edit_technology->technology_text}}</P>
		
				<i class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"> {{$edit_technology->technology_future_post}}</i>
			
			<div class="card card-footer">
				<span><i class="icon-copy fa fa-tags" aria-hidden="true"> {{$edit_technology->technology_tag}}</i></span>
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