@extends('back.layout')
@section('listed_politics')
@section('breadcrumb')
listed
@endsection
<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="blog-list">
									<ul>@foreach($listed_politics as $listed)
										<li>
											<div class="row no-gutters">
												<div class="col-lg-4 col-md-12 col-sm-12">
													<div class="blog-img">
														<img src="{{asset('image/admin/politics/'.$listed->politics_img)}}" alt="" class="bg_img">
													</div>
												</div>
												<div class="col-lg-8 col-md-12 col-sm-12">
													<div class="blog-caption">
														<h4><a href="#">{{$listed->politics_title}}</a></h4>
														<div class="blog-by">
															<p>{!!$listed->politics_text!!}</p>
															<div class="pt-10">
																<a href="#" class="btn btn-outline-primary">Read More</a>
															</div>
															
														</div>
													</div>
													<div class=" form-control hover_menu badge-light">
														<a class="pr-1 cursor_tag" href="{{ route('/edit_politics',['id'=>$listed->id]) }}"><i class="icon-copy fa fa-edit text-success" aria-hidden="true"></i></a>
														<a class="pr-1 cursor_tag" href="{{ route('/delete_politics',['id'=>$listed->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>
														<a class="cursor_tag" href="#" ><i class="icon-copy fa fa-eye text-info" aria-hidden="true"></i></a>
													</div>
													<div class="float-lg-right mr-0 dot_hover">ooo</div>
												</div>

											</div>


										</li>
										@endforeach

									</ul>
								</div>
								<div class="blog-pagination">
									<div class="btn-toolbar justify-content-center mb-15">
										<div class="btn-group">
											<a href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
											<a href="#" class="btn btn-outline-primary">1</a>
											<a href="#" class="btn btn-outline-primary">2</a>
											<span class="btn btn-primary current">3</span>
											<a href="#" class="btn btn-outline-primary">4</a>
											<a href="#" class="btn btn-outline-primary">5</a>
											<a href="#" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="card-box mb-30">
									<h5 class="pd-20 h5 mb-0">Categories</h5>
									<div class="list-group">
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">Post politics Deleted <span class="badge badge-primary badge-pill">{{$listed_politics_count}}</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">Css <span class="badge badge-primary badge-pill">10</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between active">Bootstrap <span class="badge badge-primary badge-pill">8</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">jQuery <span class="badge badge-primary badge-pill">15</span></a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">Design <span class="badge badge-primary badge-pill">5</span></a>
									</div>
								</div>
								<div class="card-box mb-30">
									<h5 class="pd-20 h5 mb-0">Latest Post</h5>
									<div class="latest-post">
										<ul>
											<li>
												<h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
												<span>HTML</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Css</span>
											</li>
											<li>
												<h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
												<span>jQuery</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Bootstrap</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Design</span>
											</li>
										</ul>
									</div>
								</div>
								<div class="card-box overflow-hidden">
									<h5 class="pd-20 h5 mb-0">Archives</h5>
									<div class="list-group">
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">January 2020</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">February 2020</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">March 2020</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">April 2020</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">May 2020</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

@endsection