@extends('back.layout')
@section('edit_politics')
@section('breadcrumb')
Edit
@endsection
	

			<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="{{ route('/update_politics',['id'=>$edit_politics->id]) }}" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Update Post <span class="float-lg-right"><a href="admin/listed_politics" class="text-white"title="">Listed</a></span></label>
			{{-- title --}}
			<div class="form-group">
				<input name="politics_title"class="form-control inputbox_color" type="text" placeholder="politics Title..."data-toggle="tooltip" data-placement="left" title="politics Title" value="{{$edit_politics->politics_title}}">
			</div>
			{{-- politics --}}
			<div class="form-group">
				<textarea name="politics_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="politics here..."data-toggle="tooltip" data-placement="left" title="Type politics">{{$edit_politics->politics_text}}</textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<img class="img-thumbnail border-success" src="{{asset('image/admin/politics/'.$edit_politics->politics_img)}}" alt="">
				<input name="politics_img"class="form-control inputbox_color" type="file" placeholder="politics img...">
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="politics_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="politics url"value="{{$edit_politics->politics_url}}" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="politics_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="politics slug..."data-toggle="tooltip" data-placement="left" title="politics slug"value="{{$edit_politics->politics_slug}}" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="politics_tag"class="form-control inputbox_color" type="text" placeholder="politics tag..."data-toggle="tooltip" data-placement="left" title="#tag"value="{{$edit_politics->politics_tag}}" >
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="politics_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" @if($edit_politics->politics_popular==0) unchecked @else checked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="politics_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"@if($edit_politics->politics_status==0) unchecked @else checked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="politics_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" value="{{$edit_politics->politics_future_post}}" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
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
			<img id="politics_img"class="mb-3"src="{{asset('image/admin/politics/'.$edit_politics->politics_img)}}" alt="">
			<h4 id="politics_title"class="text-capitalize mb-2">{{$edit_politics->politics_title}}</h4>
			<P>{{$edit_politics->politics_text}}</P>
		
				<i class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"> {{$edit_politics->politics_future_post}}</i>
			
			<div class="card card-footer">
				<span><i class="icon-copy fa fa-tags" aria-hidden="true"> {{$edit_politics->politics_tag}}</i></span>
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