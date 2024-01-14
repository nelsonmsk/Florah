@extends('bouquets.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
    <div class="card">
	 
		<div class="card-header header-danger">
			<h2><span class="card-category">{{ __('Bouquets') }} </span> 
			@if(Auth::user()->type == "admin")
				<a href="{{config('app.url')}}/bouquets/create" class="btn btn-secondary pull-right">Create New</a></h2>
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
									@if($bouquetTypes->count() != 0)
										@foreach($bouquetTypes as $bt)
											<button class="button" data-filter=".{{$bt->name}}">{{$bt->name}}</button>
										@endforeach
									@else
									<button class="button" data-filter=".tulips">Tulips</button>
									<button class="button" data-filter=".roses">Roses</button>
									<button class="button" data-filter=".lilies">Lilies</button>
									<button class="button" data-filter=".lotus">Lotus</button>
									<button class="button" data-filter=".daisies">Daisies</button>
									<button class="button" data-filter=".jasmines">Jasmines</button>
									<button class="button" data-filter=".carnations">Carnations</button>
									<button class="button" data-filter=".orchid">Orchid</button>					
									@endif
								</div> <!-- end of button group -->
							  </div>
							</div>

							<div class="grid gallery-container">
							@if($bouquets->count() != 0)
								@foreach($bouquets as $fl)
									<div class="col-lg-4 col-md-6 gallery-item {{$fl->type}}">
										<div class="gallery-wrap">
										@if($bouquetsImages->count() != 0)
											@foreach($bouquetsImages as $fi)
												@if($fi->ref_id == $fl->id)		
													<img src="{{ asset('storage/'.$fi->imagePath)}}" class="img-fluid" alt="">
												@endif
											@endforeach
										@else
											<img src="{{ asset('images/gallery/g1.jpg') }}" class="img-fluid" alt="">									
										@endif
										  <div class="gallery-info">
											<h4>{{$fl->name}}</h4>
											<h5>${{$fl->price}}</h5>
											<div class="gallery-links">
											@if($bouquetsImages->count() != 0)
												@foreach($bouquetsImages as $fi)
													@if($fi->ref_id == $fl->id && $fi->image != Null)
														<a href="{{ asset('storage/'.$fi->imagePath)}}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 1"><i class="bx bx-plus"></i></a>										
													@endif	
												@endforeach
											@endif
											  <a href="{{ asset('images/gallery/g1.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
											  <a href="bouquets/{{$fl->id}}" title="More Details"><i class="bx bx-link"></i></a>
											</div>
										  </div>
										</div>
									</div>
								@endforeach
							@else
							  <div class="col-lg-4 col-md-6 gallery-item roses">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/gallery/g1.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Roses Bouquets</h4>
									<h5>$55.00</h5>
									<div class="gallery-links">
									  <a href="{{ asset('images/gallery/g1.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item tulips">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/gallery/g2.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Web 3</h4>
									<p>Web</p>
									<div class="gallery-links">
									  <a href="{{asset('images/gallery/g2.jpg')}}" data-gallery="imagesGallery" class="gallery-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item roses">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/gallery/g3.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>App 2</h4>
									<p>App</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/gallery/g3.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item lotus">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/gallery/g4.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Card 2</h4>
									<p>Card</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/gallery/g4.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item tulips">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/gallery/g5.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Web 2</h4>
									<p>Web</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/gallery/g5.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item roses">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/gallery/g6.png') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>App 3</h4>
									<p>App</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/gallery/g6.png') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item lotus">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/gallery/g7.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Card 1</h4>
									<p>Card</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/gallery/g7.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item lotus">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/gallery/g1.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Card 3</h4>
									<p>Card</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/gallery/g1.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
									  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
									</div>
								  </div>
								</div>
							  </div>

							  <div class="col-lg-4 col-md-6 gallery-item tulips">
								<div class="gallery-wrap">
								  <img src="{{ asset('images/gallery/g2.jpg') }}" class="img-fluid" alt="">
								  <div class="gallery-info">
									<h4>Web 3</h4>
									<p>Web</p>
									<div class="gallery-links">
									  <a href="{{ asset('images/gallery/g2.jpg') }}" data-gallery="imagesGallery" class="gallery-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
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