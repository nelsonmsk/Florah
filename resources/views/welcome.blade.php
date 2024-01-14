 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'titlePage'=> 'Authhome','rtemplate' => $rtemplate])


@section('content')



  @auth
    <div class="container-fluid page-cover " id="home">
		<div class="cover">
				<div class="intro-text">
				</div>
				<div class="page-text">
						<p>Hie {{auth()->user()->name}} : Welcome to <span> </span></p>
						
				</div>
		</div>	
    </div>
  @else
    <section id="home" class="section-home">
		<div class="section-overlay"></div>
        <div class="container home">
            <div class="row">
				<div class="col-md-12 col-lg-12 text-md-start text-center">
					<div id="customCarousel1" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
						  <div class="carousel-item active">
							<div class="container ">
							  <div class="row rw-align">
								<div class="col-md-12 col-lg-12 col-tl">
								  <h1 class="h1-large fs-md-5 fs-lg-6"> Awesome And Stunning Bouquets &amp Flowers</h1>
								  <p class="p-large">Great Bouquets and Flowers in all variety </p>
								  <a class="btn btn-warning btn-solid-lg" href="#" role="button">Get Started</a>
								  <a class="btn btn-plain-lg" href="#" role="button">Register</a>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="carousel-item ">
							<div class="container ">
							  <div class="row rw-align">
								<div class="col-md-12 col-lg-12 col-tl ">
								  <h1 class="h1-large fs-md-5 fs-lg-6"> Get Affordable And Beautiful Flowers </h1>
								  <p class="p-large">Affordable packages for your satisfaction  </p>
								  <a class="btn btn-warning btn-solid-lg" href="#" role="button">Get Started</a>
								  <a class="btn btn-plain-lg" href="#" role="button">Register</a>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="carousel-item ">
							<div class="container ">
							  <div class="row rw-align">
								<div class="col-md-12 col-lg-12 col-tl">
								  <h1 class="h1-large fs-md-5 fs-lg-6">Make Every Moment Special With Our Bouquets</h1>
								  <p class="p-large text-sz">Every occasion deserves flowers to brighten it up  </p>
								  <a class="btn btn-warning btn-solid-lg" href="#" role="button">Get Started </a>
								  <a class="btn btn-plain-lg" href="#" role="button">Register</a>
								</div>
							  </div>
							</div>
						  </div>						  
						</div>
						<ol class="carousel-indicators">
						  <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
						  <li data-target="#customCarousel1" data-slide-to="1"></li>
						  <li data-target="#customCarousel1" data-slide-to="2"></li>
						</ol>
					</div>
				</div>
            </div>
        </div> 
    </section>

	<section  id="works" class="pt-8 bg-soft-primary"> 

		<div class="row">
			<div class="col-lg-6 col-xxl-5 text-center mx-auto feature-header">
				<h2 class="h2-heading">How It Works<div class="header-strips-two"></div></h2>
				<p class="mb-1">Easy Steps To order Your Perfect Flowers.</p>
			</div>						
		</div>

		<div class="row ">
		@if($rtemplate['services']->count() == 0)				
			@foreach($rtemplate['services'] as $sv)
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
					<div class="intro-icon">
						<span class="fas {{$sv->icon}}"></span>
					</div>
					<h4 class="intro-title">{{ $sv->name }}</h4>
					<p class="intro-content">{{$sv->description}}</p>
				</div>
			</div>		
			@endforeach
		@else
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
					<div class="intro-icon">
						<span class="fas fa-book"></span>
					</div>
					<h4 class="intro-title">Sign Up To Register</h4>
					<p class="intro-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ut aliquip</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.5s" >
				<div class="intro-item">
					<div class="intro-icon">
						<span class="fas fa-handshake-o"></span>
					</div>
					<h4 class="intro-title">Select The Best Deal</h4>
					<p class="intro-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ut aliquip</p>
				</div>
			</div>			
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.0s" >
					<div class="intro-icon">
						<span class="fas fa-globe"></span>
					</div>
					<h4 class="intro-title">Choose Your location</h4>
					<p class="intro-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ut aliquip</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.5s" >
				<div class="intro-item">
					<div class="intro-icon">
						<span class="fas fa-shopping-basket"></span>
					</div>
					<h4 class="intro-title">Submit Your Order</h4>
					<p class="intro-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ut aliquip</p>
				</div>
			</div>	
		@endif
		</div>
	</section>

      <!-- ============================================-->
	<section  id="section-details" class="pt-8 bg-soft-primary">  
	      <!-- Details 1 -->
			<div id="details" class="basic-1">
				<div class="container">				
					<div class="row details-bs">
						<div class="col-lg-5 col-xl-5">
							<div class="text-container">
								@if($rtemplate['banners']->count() == 0)
									<h2>{{$rtemplate['banners'][0]->heading}}</h2>
									<p>{{$rtemplate['banners'][0]->body}}
									</p>								
								@else							
									<h2>Choose The Best Flower Arrangements For Your Custom Bouquets</h2>
									<p>Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. Integer id quam id tellus hendrerit laciniad binfer
										Sed id dui rutrum, dictum urna eu, accumsan turpis. Fusce id auctor velit, sed viverra dui rem dina
									</p>
								@endif
								<a class="btn btn-warning btn-fs" href="#login">Sign In</a>
							</div>  
						</div> 
						<div class="col-lg-7 col-xl-7">
							<div class="image-container">
								@if($rtemplate['bannersImages']->count() != 0)
									@foreach($rtemplate['bannersImages'] as $bi)
										@if($bi->ref_id == 1)
											<img src="{{ asset('storage/'.$bi->imagePath)}}" alt="alternative">
										@endif
									@endforeach
								@else
									<img class="img-fluid" src="images/features/fw1.jpg" alt="alternative">
								@endif
							</div> 
						</div> 						
					</div> 
				</div> 
			</div> 
	</section>
    <!-- end of details 1 -->

	<!--=== Step-1 section Starts ===-->
	<section id="step-1" class="section-step step-wrap">
	   <!--Client logo-->
	   <div id="carousel-our-gallery" class="owl-carousel text-center margin-top-20">
		@if($rtemplate['carouselImages']->count() > 5)
			@foreach($rtemplate['carouselImages'] as $ci)	
			  <div class="our-gallery"> <a href="#"> <img src="{{ asset('storage/'.$ci->imagePath)}}" class="img-responsive" alt="" /> </a> </div>
			@endforeach
		@else	   
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw1.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw2.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw3.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw4.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw5.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw6.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw7.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw8.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw9.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw10.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw11.jpg" class="img-responsive" alt="" /> </a> </div>
		  <div class="our-gallery"> <a href="#"> <img src="images/gallery/fw.jpg" class="img-responsive" alt="" /> </a> </div>
		@endif
	   </div>
	   <!--/Client logo--> 
	</section>
	<!--=== Step-1 section Ends ===-->

     <!-- ============================================-->
	<section  id="section-details" class="pt-8 bg-soft-primary">  
	      <!-- Details 1 -->
			<div id="details" class="basic-2">
				<div class="container">				
					<div class="row details-bs">
						<div class="col-lg-7 col-xl-7">
							<div class="image-container">
								@if($rtemplate['bannersImages']->count() != 0)
									@foreach($rtemplate['bannersImages'] as $bi)
										@if($bi->ref_id == 1)
											<img src="{{ asset('storage/'.$bi->imagePath)}}" alt="alternative">
										@endif
									@endforeach
								@else	
									<img class="img-fluid" src="images/features/f2.jpg" alt="alternative">
								@endif
							</div> 
						</div> 						
						<div class="col-lg-5 col-xl-5">
							<div class="text-container">
								@if($rtemplate['banners']->count() == 0)
									<h2>{{$rtemplate['banners'][1]->heading}}</h2>
									<p>{{$rtemplate['banners'][1]->body}}
									</p>								
								@else	
									<h2>Affordable Prices And Packages That Meet Your Budget</h2>
									<p>Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. Integer id quam id tellus hendrerit laciniad binfer
										Sed id dui rutrum, dictum urna eu, accumsan turpis. Fusce id auctor velit, sed viverra dui rem dina
									</p>
								@endif
								<a class="btn btn-success btn-fs" href="#">	Register</a>
							</div>  
						</div> 					
					</div> 
				</div> 
			</div> 
	</section>
    <!-- end of details 1 -->
	
      <!--features Section begin ============================-->
    <section id="features" class="pt-8">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-xxl-5 text-center mx-auto">
              <h2 class="h2-heading">What Features We Are Offering <div class="header-strips-two"></div></h2>
              <p class="mb-4">Get the best features at the price you can afford</p>
            </div>
          </div>
          <div class="row align-items-center mt-5">
            <div class="col-md-5 col-lg-6 order-md-1 order-0">
			@if($rtemplate['featuresImages']->count() != 0)
				@foreach($rtemplate['featuresImages'] as $fi)
					@if($bi->ref_id == 1)
						<img src="{{ asset('storage/'.$fi->imagePath)}}" alt="alternative">
					@endif
			    @endforeach
			@else	
				<img class="w-100" src="images/features/fw.jpg" alt="" />
			@endif
			</div>		  
            <div class="col-md-7 col-lg-6 pe-lg-4 pe-xl-7">
			@if($rtemplate['features']->count() == 0)
				@foreach($rtemplate['features'] as $ft)				
					<div class="d-flex align-items-start"><span class="flaticon-weath"></span>
						<div class="flex-1">
						   <h5>{{$ft->text}}</h5>
						   <p class="text-muted mb-4">{{$ft->body}}</p>
						</div>
					</div>		
				@endforeach
			@else
              <div class="d-flex align-items-start"><span class="flaticon-accountant"></span>
                <div class="flex-1">
                  <h5>Easy to Use Processes</h5>
                  <p class="text-muted mb-4">Simple florist hiring, flowers &amp bouquet ordering steps.Designed for the best use experience </p>
                </div>
              </div>
              <div class="d-flex align-items-start"><span class="flaticon-wealth"></span>
                <div class="flex-1">
                  <h5>Secure Payment Systems</h5>
                  <p class="text-muted mb-4">Make secure payments transactions with Stripe Services Portal. Transact with confidence. </p>
                </div>
              </div>			  
              <div class="d-flex align-items-start"><span class="flaticon-accounting-1"></span>
                <div class="flex-1">
                  <h5>Real Time Notifications</h5>
                  <p class="text-muted mb-4">Be able to receive real-time app notication updates</p>
                </div>
              </div>
              <div class="d-flex align-items-start"><span class="flaticon-budget"></span>
                <div class="flex-1">
                  <h5>Simple Pdf Reports</h5>
                  <p class="text-muted mb-4">Generate custom PDF reports from your Bookings and Orders database tables activities history</p>
                </div>
              </div>
              <div class="d-flex align-items-start"><span class="flaticon-wealth"></span>
                <div class="flex-1">
                  <h5>Secure Email Messaging</h5>
                  <p class="text-muted mb-4">Communicate with easy using our app messaging board</p>
                </div>
              </div>	
			@endif
            </div>			
          </div>
        </div>
    </section>
      <!-- <section> close ============================-->

     <!-- ============================================-->
	<section  id="section-banner" class="py-8 bg-soft-primary">  
	      <div class="section-overlay-2"></div>
			<div id="details" class="banner basic-2">
				<div class="container">				
					<div class="row"> 					
						<div class="col-lg-12 col-xl-12">
							<div class="text-container">
								<h2>Do you have a function or event &amp need a flower expert?</h2>
								<a class="btn btn-warning btn-fs" href="#">Hire a Florist</a>
							</div>  
						</div> 					
					</div> 
				</div> 
			</div> 
	</section>
    <!-- end of details 1 -->



      <!-- ============================================-->
	<section  id="section-details" class="pt-8 bg-soft-primary">  
	      <!-- Details 1 -->
			<div id="details" class="basic-1">
				<div class="container">				
					<div class="row details-bs">
						<div class="col-lg-5 col-xl-5">
							<div class="text-container">
								@if($rtemplate['banners']->count() == 0)
									<h2>{{$rtemplate['banners'][2]->heading}}</h2>
									<p>{{$rtemplate['banners'][2]->body}}
									</p>								
								@else
									<h2>Get Your Order Delivered To Your Desired Location</h2>
									<p>Maecenas fringilla quam posuere, pellentesque est nec, gravida turpis. Integer vitae mollis felis. Integer id quam id tellus hendrerit laciniad binfer
										Sed id dui rutrum, dictum urna eu, accumsan turpis. Fusce id auctor velit, sed viverra dui rem dina
									</p>
								@endif
								<a class="btn btn-warning btn-fs" href="#">Register</a>
							</div>  
						</div> 
						<div class="col-lg-7 col-xl-7">
							<div class="image-container">
								@if($rtemplate['bannersImages']->count() != 0)
									@foreach($rtemplate['bannersImages'] as $bi)
										@if($bi->ref_id == 3)
											<img src="{{ asset('storage/'.$bi->imagePath)}}" alt="alternative">
										@endif
									@endforeach
								@else	
									<img class="img-fluid" src="images/features/f3.jpg" alt="alternative">
								@endif
							</div> 
						</div> 						
					</div> 
				</div> 
			</div> 
	</section>
    <!-- end of details 1 -->

  @endauth
  
@endsection
 