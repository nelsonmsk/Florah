@extends('flowers.Index')

@section('body')

<div class="col-lg-12 col-md-12">
    <div class="card">
		<div class="card-header header-danger">
		<h2><span class="card-category">{{ __('Flower') }} {{$flower->id }} </span>
		<a href="{{config('app.url')}}/flowers" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
		<div class="card-body">	
			<section id="step-1" class="section-step step-wrap">
				<div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
					<div class="row">
						<!-- Step Description Starts -->
						<div class="col-md-8 step-desc">
							
							<div class="col-md-12 step-details">
									<div class="row form-group row-step"><span class="col-md-3"><b>Id:</b></span><span class="col-md-9 form-control text-left"> {{$flower->id}}</span></div>
									<div class="row form-group row-step"><span class="col-md-3"><b>Name:</b></span><span class="col-md-9 form-control text-left"> {{$flower->name}}</span></div>
									<div class="row form-group row-step"><span class="col-md-3"><b>Type:</b></span><span class="col-md-9 form-control text-left"> {{$flower->type}}</span></div>							
									<div class="row form-group row-step"><span class="col-md-3"><b>SKU:</b></span><span class="col-md-9 form-control text-left"> {{$flower->sku}}</span></div>							
									<div class="row form-group row-step"><span class="col-md-3"><b>Description:</b></span><span class="col-md-9 text-left"> {{$flower->description}}</span></div>
									<div class="row form-group row-step"><span class="col-md-3"><b>Price $:</b></span><span class="col-md-9 form-control text-left"> {{$flower->price}}</span></div>	
									@if(Auth::user()->type == "admin")
									<div class="row form-group row-step"><span class="col-md-3"><b>Created:</b></span><span class="col-md-9 form-control text-left"> {{$flower->created_at}}</span></div>
									<div class="row form-group row-step"><span class="col-md-3"><b>Modified:</b></span><span class="col-md-9 form-control text-left"> {{$flower->updated_at}}</span></div>									
									@endif
							</div> <!-- End step-details -->
						</div>
						<!-- Step Description Ends -->
						<div class="col-md-4 step-img">
						@if($galleryImage->count() != 0)
							<img src="{{ asset('storage/'.$galleryImage->imagePath)}}"/> <!-- Step Photo Here -->				
						@else
							<img src="../images/gallery/g1.jpg" alt="" /> <!-- Step Photo Here -->
						@endif
						</div>
					</div>
							<div class="row text-center">
							 <a href="{{url()->previous()}}" id="back-btn" class="btn btn-lg-6 btn-default">
										 Back <div class="fa fa-arrow-left text-white"></div></a>					
							@if(Auth::user()->type == "admin")	
							<a href="flowers/{{$flower->id}}"  id="edit-btn" class="btn btn-md-4 btn-primary ">Edit
										<div class="fa fa-edit text-white"></div></a>					 
							<a href="flowers/{{$flower->id}}"  id="delete-btn" class="btn btn-md-4 btn-danger" action="flowers" >Delete
										<div class="fa fa-trash text-white"></div></a>
							@else
							<a href="#" id="additem-btn" class="btn btn-md-4 btn-success" item="{{$flower}}">Add to Cart
										<div class="fa fa-shopping-cart text-white"></div></a>					 						
							@endif
						  </div>			
				</div>
			</section>
		</div> 		   

    </div>
</div>
@endsection