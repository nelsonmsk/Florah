@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'portfolio','titlePage' => __('projectView'),$rtemplate])

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container dark-bg">
        <h2>Portfolio Details</h2>
      </div>
    </section>
	<!-- End Breadcrumbs -->
	<!-- ======= Project Details Section ======= -->
	<section id="project-details" class="project-details">
		<div class="container">
			<div class="row gy-4">
			@if($rtemplate['projects']->count() != 0)
				@foreach($rtemplate['projects'] as $pj)			
				<div class="col-lg-8">
					<div class="project-details-slider swiper">
					    <div class="swiper-wrapper align-items-center">
							<div class="swiper-slide">							
								@if($rtemplate['projectsImages']->count() != 0)
									@foreach($rtemplate['projectsImages'] as $pi)
										@if($pi->ref_id == $pj->id)
											<img src="{{ asset('storage/'.$pi->imagePath)}}"/> 
										@endif
									@endforeach
							    @else
								  <img src="{{ asset('images/project-6.jpg')}}" alt=""/>									
								@endif
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>							
				<div class="col-lg-4">
					<div class="project-info">
					  <h3>{{$pj->type}}</h3>
					  <ul>
						<li><strong>Name</strong>: {{$pj->name}}</li>
						<li><strong>Status</strong>: {{$pj->status}}</li>
						<li><strong>Start Date</strong>: {{$pj->sdate}}</li>
						<li><strong>End Date</strong>: {{$pj->edate}}</li>										
					  </ul>
					</div>
					<div class="project-description">
					  <h2>Description</h2>
					  <p>
						{{$pj->description}}		
					  </p>
					</div>
				</div>
				<div class="col-lg-12 ft-2">
					<a href="{{config('app.url')}}/#portfolio" class="btn-lg btn-blue back-button">Back to Portfolio</a>
				</div>
				@endforeach
			@else
				<div class="col-lg-8">
					<div class="project-details-slider swiper">
					    <div class="swiper-wrapper align-items-center">
							<div class="swiper-slide">
							  <img src="{{ asset('images/project-2.jpg')}}" alt="">
							</div>
							<div class="swiper-slide">
							  <img src="{{ asset('images/project-3.jpg')}}" alt="">
							</div>
							<div class="swiper-slide">
							  <img src="{{ asset('images/project-4.jpg')}}" alt="">
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>							
				<div class="col-lg-4">
					<div class="project-info">
					  <h3>Project Information</h3>
					  <ul>
						<li><strong>Type</strong>: Web Applications</li>
						<li><strong>Client</strong>: Haven Prints LLC</li>						
						<li><strong>Status</strong>: Complete</li>
						<li><strong>Start Date</strong>: 12 Jan 2019</li>
						<li><strong>End Date</strong>: 28 Nov 2019</li>	
						<li><strong>Url Link</strong>: <a href="#">www.project.com</a></li>							
					  </ul>
					</div>
					<div class="project-description">
					  <h2>Description</h2>
					  <p>
						Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. 
					  </p>
					</div>
				</div>
				<div class="col-lg-12 ft-2">
					<a href="{{config('app.url')}}/#portfolio" class="btn-lg btn-blue back-button">Back to Portfolio</a>
				</div>				
			@endif
			</div>
		</div>
	</section>
<!-- End Portfolio Details Section --> 
@endsection 