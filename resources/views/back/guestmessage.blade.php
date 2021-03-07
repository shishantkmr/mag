@extends('back.layout')
@section('guestmessage')
@section('breadcrumb')
Guest Message
@endsection

<!-- Simple Datatable start -->
<div class="card-box mb-30">
	<div class="pd-20">
		<h4 class="text-blue h4">Guest Messages</h4>

	</div>
	<div class="pb-20">
		<table class="data-table table stripe hover nowrap">
			<thead>
				<tr>
					<th class="table-plus datatable-nosort">Name</th>
					<th>Email</th>
					<th>Message</th>

					<th>Post Date</th>
					<th class="datatable-nosort">Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($get_guest as $guest)
				<tr>
					<td class="table-plus">{{$guest->name}}</td>
					<td>{{$guest->email}}</td>
					<td>{!!Str::limit($guest->message,50,'. . .')!!}</td>
					<td>{{$guest->created_at->diffForHumans()}}</td>

					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<div id="clicks">
									<a  id="{{$guest->id}}" class="modelview dropdown-item" href="{{ route('/get_guest_single',['id'=>$guest->id]) }}"  class="btn-block" data-toggle="modal" data-target="#Medium-modal" type="button"><i class="dw dw-eye"></i> View</a>
									<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
								</div>
								<a class="dropdown-item" href="{{ route('/delete_contact',['id'=>$guest->id]) }}"><i class="dw dw-delete-3"></i> Delete</a>
								
								
							</div>
						</div>
					</td>
				</tr>
				@empty Has not Guest Message Arrive !!
				@endforelse


			</tbody>
		</table>
	</div>
</div>
<div id="show"></div>
<!-- Medium modal -->
<div class="col-md-4 col-sm-12 mb-30">



	<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<div class="col-lg-10
					 ml-0 " style="padding-left:0px!important; text-transform:uppercase;"><h4 class="modal-title title1 text-white" id="myLargeModalLabel"><i class="icon-copy fa fa-user text-warning" aria-hidden="true"></i> </h4>	
					<span class="email text-lowercase text-white"><i class="icon-copy fa fa-envelope-o" aria-hidden="true"></i> </span>
				</div>
				<div class="col-lg-2">	
					<button type="button" class="close exit" data-dismiss="modal" aria-hidden="true">×</button>
				</div>



			</div>
			<div class="modal-body model_body">
				<p class="body"><i class="icon-copy fa fa-commenting-o text-warning" aria-hidden="true"></i> </p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger exit" data-dismiss="modal">Close</button>
				{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
			</div>
		</div>
	</div>
</div>

</div>
<script>
	$(document).ready(function(){
		$("body").on('click', '.modelview', function(){
			event.preventDefault();
			var id = $(this).attr("id");
			// var i=location.pathname;
		// alert('helo'+id)
			console.log(+id);
		$.ajax({
			url: '/get_guest_single/'+id,
			type: 'GET',
			dataType: 'json',
           success: function(response){ // What to do if we succeed
           	$('.title1').append(response.name);
           	$('.email').append(response.email);
           	$('.body').append(response.message);
           	// $('#breakingnews_text').append(response.breakingnews_text);
           	// $('#breakingnews_tag').append(' '+response.breakingnews_tag);
           	// $('#breakingnews_future_post').append(' '+response.breakingnews_future_post);
           	// $("img#breakingnews_img").attr('src' , 'image/admin/breakingnews/'+response.breakingnews_img);


           },
           error: function(response){
           	console.log('error')
           	alert('Error'+response);
           }
       });
	});
		$('.exit').click(function(){location.reload();});
	});
</script>

@endsection