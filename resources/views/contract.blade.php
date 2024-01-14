@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'checkoutList', 'titlePage'=> __('checkoutList')])

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container dark-bg">
        <h2>Labour Contract</h2>
      </div>
    </section>
	<!-- End Breadcrumbs -->
	<!-- ======= Shopping Cart Section ======= -->
	<section class="h-100 h-custom checkout-section" id="list-checkout" style="background-color: #eee;">
	  <div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col">
			<div class="card">
			  <div class="card-body p-4">

				<div class="row checkout">

				  <div class="col-lg-7">
					<h5 class="mb-3"><a href="{{url()->previous()}}" class="checkout-head text-body"><i
						  class="fas fa-long-arrow-alt-left me-2"></i> Contract Details</a></h5>
					<div class="card mb-3 checkout-body">
						<form class="form-horizontal singleForm" id="checkoutList-form" method="post" action="clients" data-parsley-validate>
							<div class="form-group">
								<input type="hidden" value="{{csrf_token()}}" name="_token" />
							  <label class="col-sm-2 control-label">{{ __('Venue') }}</label>
							  <div class="col-sm-10">
								  <textarea id="address" name="address" class="form-control"></textarea>
							</div>
						  </div>
							<div class="form-group">
								<label for="city" class="col-sm-2 control-label">{{ __('City') }}</label>
								<div class="col-sm-10">
								  <input id="city" type="text"  class="form-control" name="city"  required>
								</div>
							</div>	
					  </form> 					
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</section>
<!-- End Shopping Cart Section --> 
@endsection 