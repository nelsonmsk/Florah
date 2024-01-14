@extends('florists.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Florist') }} {{$florist->id }} </span>
		<a href="{{config('app.url')}}/florists" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
	<section id="step-1" class="section-step step-wrap">
		<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
			<div class="row">
				<!-- Step Description Starts -->
				<div class="col-md-8 step-desc">
					
					<div class="col-md-12 step-details">
							<div class="row form-group row-step"><span class="col-md-3"><b>Name:</b></span><span class="col-md-9 form-control text-left"> {{$florist->name}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Email:</b></span><span class="col-md-9 form-control text-left"> {{$florist->email}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Phone:</b></span><span class="col-md-9 form-control text-left"> {{$florist->phone}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Bio:</b></span><span class="col-md-9 text-left">{{$florist->bio}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Experience:</b></span><span class="col-md-9 form-control text-left">{{$florist->experience}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Speciality:</b></span><span class="col-md-9 form-control text-left">{{$florist->speciality}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Rates p/hr: $</b></span><span class="col-md-9 form-control text-left">{{$florist->rates}}</span></div>	
							@if(Auth::user()->type == "admin")
							<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left">{{$florist->created_at}}</span></div>
							<div class="row form-group row-step"><span class="col-md-3"><b>Updated:</b></span><span class="col-md-9 form-control text-left"> {{$florist->updated_at}}</span></div>	
							@endif
					</div> <!-- End step-details -->
				</div>
				<!-- Step Description Ends -->
				<div class="col-md-4 step-img">
				@if($galleryImage->count() != 0)
					<img src="{{ asset('storage/'.$galleryImage->imagePath)}}"/> <!-- Step Photo Here -->				
				@else				
					<img src="../images/florists/f1.jpg" alt="" /> <!-- Step Photo Here -->
				@endif
				</div>
			</div>
					<div class="row text-center">
					 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-lg-6 btn-default ">
								<div class="fa fa-arrow-left text-white"></div>  Back</a>
					@if(Auth::user()->type == "admin")
					<a href="florists/{{$florist->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
								<div class="fa fa-edit text-white"></div> </a>					 
					<a href="florists/{{$florist->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger" action="florists">Delete
								<div class="fa fa-trash text-white"></div></a>
					@else
					<a href="#"  id="addhire-btn" class="btn btn-md-4 btn-success" hire="{{$florist}}">Add to List
								<div class="fa fa-list-ul text-white"></div></a>							
					@endif
                  </div>			
		</div>
	</section>
		</div> 		   

    </div>
</div>
@endsection