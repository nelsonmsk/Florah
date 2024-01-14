@extends('florists.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
    <div class="card">
	 
		<div class="card-header header-danger">
			<h2><span class="card-category">{{ __('Florists') }} </span> 
			@if(Auth::user()->type == "admin")
				<a href="{{config('app.url')}}/florists/create" class="btn btn-secondary pull-right">Create New</a></h2>
			@endif
		</div>

		<div class="card-body">
			<!--------------- Screenshot --------------->
			<div id="gallery" class="section section-padding">
				<div id="screenshot" class="container">
					<section id="gallery" class="filter gallery">
					    <div class="container">
					  
							<div class="row">
							  <div class="col-lg-12 d-flex justify-content-center">
								<div class="button-group filters-button-group">
									<button class="button is-checked" data-filter="*">All</button>
									<button class="button" data-filter=".expert">Expert</button>
									<button class="button" data-filter=".professional">Professional</button>
									<button class="button" data-filter=".novice">Novice</button>									
								</div> <!-- end of button group -->
							  </div>
							</div>

							<div class="grid gallery-container">
							@if($florists->count() != 0)
								@foreach($florists as $fl)
									<div class="col-lg-4 col-md-6 gallery-item {{$fl->type}}">
										<div class="gallery-wrap">
										@if($floristsImages->count() != 0)
											@foreach($floristsImages as $fi)
												@if($fi->ref_id == $fl->id)		
													<img src="{{ asset('storage/'.$fi->imagePath)}}" class="img-fluid" alt="">
												@endif
											@endforeach
										@else
											<img src="{{ asset('images/florists/f1.jpg') }}" class="img-fluid" alt="">									
										@endif
										  <div class="gallery-info">
											<h4>{{$fl->name}}</h4>
											<p>{{$fl->email}}</p>
											<div class="gallery-links">
											@if($floristsImages->count() != 0)
												@foreach($floristsImages as $fi)
													@if($fi->ref_id == $fl->id && $fi->image != Null)
														<a href="{{ asset('storage/'.$fi->imagePath)}}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 1"><i class="bx bx-plus"></i></a>										
													@endif	
												@endforeach
											@endif
											  <a href="{{ asset('images/florists/f1.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
											  <a href="florists/{{$fl->id}}" title="More Details"><i class="bx bx-link"></i></a>
											</div>
										  </div>
										</div>
									</div>
								@endforeach
							@else
							  <div class="col-lg-4 col-md-6 gallery-item professional">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/florists/f1.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Amanda Hulley</h4>
									<p>b@hulley.com</p>
									<h5>$10/hr</h5>
									<div class="gallery-links">
									  <a href="{{ asset('images/florists/f1.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item expert">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/florists/f2.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Web 3</h4>
									<p>Web</p>
									<div class="gallery-links">
									  <a href="{{asset('images/florists/f2.jpg')}}" data-gallery="imagesGallery" class="gallery-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item professional">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/florists/f3.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>App 2</h4>
									<p>App</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/florists/f3.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item novice">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/florists/f4.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Card 2</h4>
									<p>Card</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/florists/f4.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item expert">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/florists/f5.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Web 2</h4>
									<p>Web</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/florists/f5.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item professional">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/florists/f6.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>App 3</h4>
									<p>App</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/portfolio/portfolio.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item novice">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/florists/f7.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Card 1</h4>
									<p>Card</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/florists/f7.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item novice">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/florists/f1.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Card 3</h4>
									<p>Card</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/florists/f1.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item expert">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/florists/f2.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Web 3</h4>
									<p>Web</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/florists/f2.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>
							 @endif
							</div>
					    </div>
					</section><!-- End Portfolio Section -->
				</div>
			</div>
        <!-- Screenshot end -->
		</div>
	</div>
</div>
@endsection