@extends('back.layout')
@section('removed_post')
@section('breadcrumb')
Removed Post
@endsection
<div class="blog-wrap">
	<div class="container pd-0">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div class="blog-list">
					{{-- Removed breakingnews --}}
					<div class="card">
						<div class="bg-danger card-header text-light">breakingnews</div>
						
						<ul>@forelse($removed_breakingnews as $listed)
							<li>
								<div class="row no-gutters bg-light">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{asset('image/admin/breakingnews/'.$listed->breakingnews_img)}}" alt="" class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{$listed->breakingnews_title}}</a></h4>
											<div class="blog-by">
												<p>{{$listed->breakingnews_text}}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary">Read More</a>
												</div>

											</div>
										</div>
										<div class=" form-control hover_menu badge-light">
											<a class="pr-1 cursor_tag" href="{{ route('/restore_breakingnews',['id'=>$listed->id]) }}"><i class="icon-copy fa fa-recycle text-success" aria-hidden="true"></i></a>
											<a class="pr-1 cursor_tag" href="{{ route('/erase_breakingnews',['id'=>$listed->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>

										</div>
										<div class="float-lg-right mr-0 dot_hover">ooo</div>
									</div>

								</div>

								@empty
								<div class="col-12 text-lg-center">									
									<span >Has not breakingnews on Trash !!</span>
								</div>
								
							</li>
							@endforelse
							<div class="col-12 text-lg-center">									
								<span class="link">{{$removed_breakingnews->links()}}</span>
							</div>
						</ul>
					</div><br>
					{{-- Removed slidepage --}}
					<div class="card">
						<div class="bg-danger card-header text-light">slidepage</div>
						
						<ul>@forelse($removed_slidepage as $listed)
							<li>
								<div class="row no-gutters bg-light">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{asset('image/admin/slidepage/'.$listed->slidepage_img)}}" alt="" class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{$listed->slidepage_title}}</a></h4>
											<div class="blog-by">
												<p>{{$listed->slidepage_text}}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary">Read More</a>
												</div>

											</div>
										</div>
										<div class=" form-control hover_menu badge-light">
											<a class="pr-1 cursor_tag" href="{{ route('/restore_slidepage',['id'=>$listed->id]) }}"><i class="icon-copy fa fa-recycle text-success" aria-hidden="true"></i></a>
											<a class="pr-1 cursor_tag" href="{{ route('/erase_slidepage',['id'=>$listed->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>

										</div>
										<div class="float-lg-right mr-0 dot_hover">ooo</div>
									</div>

								</div>

								@empty
								<div class="col-12 text-lg-center">									
									<span >Has not slidepage on Trash !!</span>
								</div>
								
							</li>
							@endforelse
							<div class="col-12 text-lg-center">									
								<span class="link">{{$removed_slidepage->links()}}</span>
							</div>
						</ul>
					</div><br>
					{{-- Removed visa --}}
					<div class="card">
						<div class="bg-danger card-header text-light">Work Visa</div>
						
						<ul>@forelse($removed_visa as $listed)
							<li>
								<div class="row no-gutters bg-light">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{asset('image/admin/visa/'.$listed->visa_img)}}" alt="" class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{$listed->visa_title}}</a></h4>
											<div class="blog-by">
												<p>{{$listed->visa_text}}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary">Read More</a>
												</div>

											</div>
										</div>
										<div class=" form-control hover_menu badge-light">
											<a class="pr-1 cursor_tag" href="{{ route('/restore_visa',['id'=>$listed->id]) }}"><i class="icon-copy fa fa-recycle text-success" aria-hidden="true"></i></a>
											<a class="pr-1 cursor_tag" href="{{ route('/erase_visa',['id'=>$listed->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>

										</div>
										<div class="float-lg-right mr-0 dot_hover">ooo</div>
									</div>

								</div>

								@empty
								<div class="col-12 text-lg-center">									
									<span >Has not Work Visa on Trash !!</span>
								</div>
								
							</li>
							@endforelse
							<div class="col-12 text-lg-center">									
								<span class="link">{{$removed_visa->links()}}</span>
							</div>
						</ul>
					</div>


					
					<br>		{{-- Removed study --}}
					<div class="card">
						<div class="bg-danger card-header text-light">Study Visa</div>

						<ul>
							@forelse($removed_study as $study)
							<li>
								<div class="row no-gutters bg-light">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{asset('image/admin/study/'.$study->study_img)}}" alt="" class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{$study->study_title}}</a></h4>
											<div class="blog-by">
												<p>{{$study->study_text}}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary">Read More</a>
												</div>

											</div>
										</div>
										<div class=" form-control hover_menu badge-light">
											<a class="pr-1 cursor_tag" href="{{ route('/restore_study',['id'=>$study->id]) }}"><i class="icon-copy fa fa-recycle text-success" aria-hidden="true"></i></a>
											<a class="pr-1 cursor_tag" href="{{ route('/erase_study',['id'=>$study->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>

										</div>
										<div class="float-lg-right mr-0 dot_hover">ooo</div>
									</div>

								</div>
								@empty
								<div class="col-12 text-lg-center">							
									<span >Has not Study Visa on Trash !!</span>
								</div>

							</li>
							@endforelse
							<div class="col-12 text-lg-center">									
								<span class="link">{{$removed_study->links()}}</span>
							</div>
						</ul>

					</div><br>
					{{-- Removed study --}}
					<div class="card">
						<div class="bg-danger card-header text-light">Travel Visa</div>

						<ul>
							@forelse($removed_travel as $travel)
							<li>
								<div class="row no-gutters bg-light">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{asset('image/admin/travel/'.$travel->travel_img)}}" alt="" class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{$travel->travel_title}}</a></h4>
											<div class="blog-by">
												<p>{!!$travel->travel_text!!}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary">Read More</a>
												</div>

											</div>
										</div>
										<div class=" form-control hover_menu badge-light">
											<a class="pr-1 cursor_tag" href="{{ route('/restore_travel',['id'=>$travel->id]) }}"><i class="icon-copy fa fa-recycle text-success" aria-hidden="true"></i></a>
											<a class="pr-1 cursor_tag" href="{{ route('/erase_travel',['id'=>$travel->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>

										</div>
										<div class="float-lg-right mr-0 dot_hover">ooo</div>
									</div>

								</div>
								@empty
								<div class="col-12 text-lg-center">							
									<span >Has not Travel Visa on Trash !!</span>
								</div>

							</li>
							@endforelse
							<div class="col-12 text-lg-center">									
								<span class="link">{{$removed_travel->links()}}</span>
							</div>
						</ul>

					</div><br>
					{{-- Removed fashion --}}
					<div class="card">
						<div class="bg-danger card-header text-light">Fashion</div>

						<ul>
							@forelse($removed_fashion as $fashion)
							<li>

								<div class="row no-gutters bg-light">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{asset('image/admin/fashion/'.$fashion->fashion_img)}}" alt="" class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{$fashion->fashion_title}}</a></h4>
											<div class="blog-by">
												<p>{{$fashion->fashion_text}}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary">Read More</a>
												</div>

											</div>
										</div>
										<div class=" form-control hover_menu badge-light">
											<a class="pr-1 cursor_tag" href="{{ route('/restore_fashion',['id'=>$fashion->id]) }}"><i class="icon-copy fa fa-recycle text-success" aria-hidden="true"></i></a>
											<a class="pr-1 cursor_tag" href="{{ route('/erase_fashion',['id'=>$fashion->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>

										</div>
										<div class="float-lg-right mr-0 dot_hover">ooo</div>
									</div>

								</div>


							</li>
							@empty
							<div class="col-12 text-lg-center">
								<span >Has not Fashion on Trash !!</span>
							</div>
							@endforelse
							<div class="col-12 text-lg-center">									
								<span class="link">{{$removed_fashion->links()}}</span>
							</div>
						</ul>

					</div>
					<br>
					{{-- Removed festival --}}
					<div class="card">
						<div class="bg-danger card-header text-light">Festival</div>

						<ul>@forelse($removed_festival as $festival)
							<li>
								<div class="row no-gutters bg-light">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{asset('image/admin/festival/'.$festival->festival_img)}}" alt="" class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{$festival->festival_title}}</a></h4>
											<div class="blog-by">
												<p>{{$festival->festival_text}}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary">Read More</a>
												</div>

											</div>
										</div>
										<div class=" form-control hover_menu badge-light">
											<a class="pr-1 cursor_tag" href="{{ route('/restore_festival',['id'=>$festival->id]) }}"><i class="icon-copy fa fa-recycle text-success" aria-hidden="true"></i></a>
											<a class="pr-1 cursor_tag" href="{{ route('/erase_festival',['id'=>$festival->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>

										</div>
										<div class="float-lg-right mr-0 dot_hover">ooo</div>
									</div>

								</div>
								@empty
								<div class="col-12 text-lg-center">							
									<span >Has not Festival on Trash !!</span>
								</div>
							</li>
							@endforelse
							<div class="col-12 text-lg-center">									
								<span class="link">{{$removed_festival->links()}}</span>
							</div>
						</ul>
					</div>
					<br>


					{{-- Removed politics --}}
					<div class="card">
						<div class="bg-danger card-header text-light">Politics</div>

						<ul>
							@forelse($removed_politics as $politics)
							<li>

								<div class="row no-gutters bg-light">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{asset('image/admin/politics/'.$politics->politics_img)}}" alt="" class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{$politics->politics_title}}</a></h4>
											<div class="blog-by">
												<p>{!!$politics->politics_text!!}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary">Read More</a>
												</div>

											</div>
										</div>
										<div class=" form-control hover_menu badge-light">
											<a class="pr-1 cursor_tag" href="{{ route('/restore_politics',['id'=>$politics->id]) }}"><i class="icon-copy fa fa-recycle text-success" aria-hidden="true"></i></a>
											<a class="pr-1 cursor_tag" href="{{ route('/erase_politics',['id'=>$politics->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>

										</div>
										<div class="float-lg-right mr-0 dot_hover">ooo</div>
									</div>

								</div>


							</li>
							@empty
							<div class="col-12 text-lg-center">
								<span >Has not politics on Trash !!</span>
							</div>
							@endforelse
							<div class="col-12 text-lg-center">									
								<span class="link">{{$removed_politics->links()}}</span>
							</div>
						</ul>

					</div>
					<br>
{{-- Removed technology --}}
					<div class="card">
						<div class="bg-danger card-header text-light">technology</div>

						<ul>
							@forelse($removed_technology as $technology)
							<li>

								<div class="row no-gutters bg-light">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{asset('image/admin/technology/'.$technology->technology_img)}}" alt="" class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{$technology->technology_title}}</a></h4>
											<div class="blog-by">
												<p>{{$technology->technology_text}}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary">Read More</a>
												</div>

											</div>
										</div>
										<div class=" form-control hover_menu badge-light">
											<a class="pr-1 cursor_tag" href="{{ route('/restore_technology',['id'=>$technology->id]) }}"><i class="icon-copy fa fa-recycle text-success" aria-hidden="true"></i></a>
											<a class="pr-1 cursor_tag" href="{{ route('/erase_technology',['id'=>$technology->id]) }}"><i class="icon-copy fa fa-trash text-danger" aria-hidden="true"></i></a>

										</div>
										<div class="float-lg-right mr-0 dot_hover">ooo</div>
									</div>

								</div>


							</li>
							@empty
							<div class="col-12 text-lg-center">
								<span >Has not technology on Trash !!</span>
							</div>
							@endforelse
							<div class="col-12 text-lg-center">									
								<span class="link">{{$removed_technology->links()}}</span>
							</div>
						</ul>

					</div>
					<br>

				</div> 
				
			</div>

			<div class="col-md-4 col-sm-12">
				<div class="card-box mb-30">
					<h5 class="pd-20 h5 mb-0">Categories</h5>
					<div class="list-group">
						<a href="#" class="list-group-item d-flex align-items-center justify-content-between">Post visa Deleted <span class="badge badge-primary badge-pill">{{$removed_visa->count()}}</span></a>
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