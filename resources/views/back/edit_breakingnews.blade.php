@extends('back.layout')
@section('edit_breakingnews')
@section('breadcrumb')
Edit
@endsection
	

			<div class="row">
	<div class="col-sm-12 col-md-6">
		<form action="{{ route('/update_breakingnews',['id'=>$edit_breakingnews->id]) }}" method="Post" enctype="multipart/form-data">
			@csrf
			<label class=" font-weight-bold text-white form-control bg-success">Update Post <span class="float-lg-right"><a href="/admin/listed_breakingnews" class="text-white"title="">Listed</a></span></label>
			{{-- title --}}
			<div class="form-group">
				<input name="breakingnews_title"class="form-control inputbox_color" type="text" placeholder="breakingnews Title..."data-toggle="tooltip" data-placement="left" title="breakingnews Title" value="{{$edit_breakingnews->breakingnews_title}}">
			</div>
			{{-- breakingnews --}}
			<div class="form-group">
				<textarea name="breakingnews_text"class="form-control inputbox_color textarea_editor" type="text" placeholder="breakingnews here..."data-toggle="tooltip" data-placement="left" title="Type breakingnews">{{$edit_breakingnews->breakingnews_text}}</textarea>
			</div>
			{{-- img --}}
			<div class="form-group">
				<img class="img-thumbnail border-success" src="{{asset('image/admin/breakingnews/'.$edit_breakingnews->breakingnews_img)}}" alt="">
				<input name="breakingnews_img"class="form-control inputbox_color" type="file" placeholder="breakingnews img...">
			</div>
			{{-- url --}}
			<div class="form-group">
				<input name="breakingnews_url"class="form-control inputbox_color" type="text" placeholder="url here..."data-toggle="tooltip" data-placement="left" title="breakingnews url"value="{{$edit_breakingnews->breakingnews_url}}" id="url">
			</div>
			{{-- slug --}}
			<div class="form-group">
				<input name="breakingnews_slug"class="form-control inputbox_color text-lowercase" type="text" placeholder="breakingnews slug..."data-toggle="tooltip" data-placement="left" title="breakingnews slug"value="{{$edit_breakingnews->breakingnews_slug}}" id="slug">
			</div>
			{{-- tag --}}
			<div class="form-group">
				<input name="breakingnews_tag"class="form-control inputbox_color" type="text" placeholder="breakingnews tag..."data-toggle="tooltip" data-placement="left" title="#tag"value="{{$edit_breakingnews->breakingnews_tag}}" >
			</div>


			<div class="form-group">
				{{-- popular --}}
				<lable class="form-group">Popular</lable>
				<input name="breakingnews_popular"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745" @if($edit_breakingnews->breakingnews_popular==0) unchecked @else checked @endif>
				{{-- Publish --}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<lable class="form-group">Publish</lable>
				<input name="breakingnews_status"type="checkbox" class="switch-btn" data-size="small" data-color="#f56767" data-secondary-color="#28a745"@if($edit_breakingnews->breakingnews_status==0) unchecked @else checked @endif>
			</div>
			{{-- schedule post --}}
			<div class="form-group">
				<input  name="breakingnews_future_post"  id="filter-date1" class="form-control " placeholder="Schedule post" value="{{$edit_breakingnews->breakingnews_future_post}}" type="text"data-toggle="tooltip" data-placement="left" title="schedule future post">
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
			<img id="breakingnews_img"class="mb-3"src="{{asset('image/admin/breakingnews/'.$edit_breakingnews->breakingnews_img)}}" alt="">
			<h4 id="breakingnews_title"class="text-capitalize mb-2">{{$edit_breakingnews->breakingnews_title}}</h4>
			<P>{{$edit_breakingnews->breakingnews_text}}</P>
		
				<i class="icon-copy fa fa-clock-o text-capitalize font-weight-bold text-gray-dark" aria-hidden="true"> {{$edit_breakingnews->breakingnews_future_post}}</i>
			
			<div class="card card-footer">
				<span><i class="icon-copy fa fa-tags" aria-hidden="true"> {{$edit_breakingnews->breakingnews_tag}}</i></span>
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