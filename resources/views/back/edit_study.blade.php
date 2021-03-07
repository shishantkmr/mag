@extends('back.layout')
@section('edit_study')
@section('breadcrumb')
Edit
@endsection
	

			<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="{{ route('admin/update_study',['id'=>$edit_study->id]) }}" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Update Post <span class="float-lg-right"><a href="{{ route('admin/listed_study') }}" class="text-white"title="">Listed</a></span></label>
			{{-- title --}}
			<div class="form-group">
				<input name="study_title"class="form-control inputbox_color" type="text" placeholder="study Title..."data-toggle="tooltip" data-placement="left" title="study Title" value="{{$edit_study->study_title}}">
			</div>
			{{-- study --}}
			<div class="form-group">
				<textarea name="study_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="study here..."data-toggle="tooltip" data-placement="left" title="Type study">{{$edit_study->study_text}}</textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<img class="img-thumbnail border-success" src="{{asset('image/admin/study/'.$edit_study->study_img)}}" alt="">
				<input name="study_img"class="form-control inputbox_color" type="file" placeholder="study img...">
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="study_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="study url"value="{{$edit_study->study_url}}" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="study_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="study slug..."data-toggle="tooltip" data-placement="left" title="study slug"value="{{$edit_study->study_slug}}" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="study_tag"class="form-control inputbox_color" type="text" placeholder="study tag..."data-toggle="tooltip" data-placement="left" title="#tag"value="{{$edit_study->study_tag}}" >
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="study_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" @if($edit_study->study_popular==0) unchecked @else checked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="study_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"  @if($edit_study->study_status==0) unchecked @else checked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="study_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" value="{{$edit_study->study_future_post}}" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
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
			<img id="study_img"class="mb-3"src="{{asset('image/admin/study/'.$edit_study->study_img)}}" alt="">
			<h4 id="study_title"class="text-capitalize mb-2">{{$edit_study->study_title}}</h4>
			<P>{{$edit_study->study_text}}</P>
		
				<i class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"> {{$edit_study->study_future_post}}</i>
			
			<div class="card card-footer">
				<span><i class="icon-copy fa fa-tags" aria-hidden="true"> {{$edit_study->study_tag}}</i></span>
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