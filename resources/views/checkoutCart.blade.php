@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'checkoutCart','titlePage' => __('checkoutCart')])

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container dark-bg">
        <h2>Cart Check-Out</h2>
      </div>
    </section>
	<!-- End Breadcrumbs -->
	<!-- ======= Shopping Cart Section ======= -->
	<section class="h-100 h-custom checkout-section" id="cart-checkout" style="background-color: #eee;">
	  <div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col">
			<div class="card">
			  <div class="card-body p-4">

				<div class="row checkout">

				  <div class="col-lg-7">
					<h5 class="mb-3"><a href="{{url()->previous()}}" class="checkout-head text-body"><i
						  class="fas fa-long-arrow-alt-left me-2"></i> Back to Cart</a></h5>
					<hr>

					<div class="d-flex justify-content-between align-items-center mb-4">
					  <div>
						<p class="mb-0 checkout-header">Select Delivery Location</p>
					  </div>
					</div>
					<div class="card mb-3 checkout-body">
						<form class="form-horizontal singleForm" id="checkoutCart-form" method="post" action="clients" data-parsley-validate>
							<div class="form-group">
								<input type="hidden" value="{{csrf_token()}}" name="_token" />	
							  <label class="col-sm-2 control-label">{{ __('Address') }}</label>
							  <div class="col-sm-10">
								  <textarea id="address" name="address" class="form-control" required></textarea>
							</div>
						  </div>
							<div class="form-group">
								<label for="city" class="col-sm-2 control-label">{{ __('City') }}</label>
								<div class="col-sm-10">
								  <input id="city" type="text"  class="form-control" name="city" required>
								</div>
							</div>	
							<hr>
							<div class="form-group">
								<label class="col-sm-12 req-label">{{ __('Special Requests') }}</label>
							</div>								
							<div class="form-group">
							  <label for="city" class="col-sm-2 control-label"></label>
							  <div class="col-sm-10">
								  <textarea id="address" name="address" class="form-control"></textarea>
							  </div>	
						    </div>
					  </form> 					
					</div>
				  </div>
				  <div class="col-lg-5">

					<div class="card bg-primary text-white rounded-3">
					  <div class="card-body">
						<div class="d-flex align-items-center mb-4">
						  <h5 class="mb-0 card-details">Card Details</h5>
						</div>

						<p class="small mb-2">Card Type</p>
						<a href="#!" type="submit" class="text-white"><i
							class="fab fa-cc-mastercard fa-2x me-2"></i></a>
						<a href="#!" type="submit" class="text-white"><i
							class="fab fa-cc-visa fa-2x me-2"></i></a>
						<a href="#!" type="submit" class="text-white"><i
							class="fab fa-cc-amex fa-2x me-2"></i></a>
						<a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

						<form class="mt-4">
						  <div class="form-outline form-white mb-4">
							<input type="text" id="typeName" class="form-control form-control-lg" size="17"
							  placeholder="Cardholder's Name" />
							<label class="form-label" for="typeName">Cardholder's Name</label>
						  </div>

						  <div class="form-outline form-white mb-4">
							<input type="text" id="typeText" class="form-control form-control-lg" size="17"
							  placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
							<label class="form-label" for="typeText">Card Number</label>
						  </div>

						  <div class="row mb-4">
							<div class="col-md-6">
							  <div class="form-outline form-white">
								<input type="text" id="typeExp" class="form-control form-control-lg"
								  placeholder="MM/YYYY" size="7" minlength="7" maxlength="7" />
								<label class="form-label" for="typeExp">Expiration</label>
							  </div>
							</div>
							<div class="col-md-6">
							  <div class="form-outline form-white">
								<input type="password" id="typePassword" class="form-control form-control-lg"
								  placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
								<label class="form-label" for="typePassword">Cvv</label>
							  </div>
							</div>
						  </div>

						</form>

						<hr class="my-4">

						<div class="d-flex justify-content-between">
						  <p class="mb-2">Subtotal</p>
						  <p class="mb-2 cart-subtotal"></p>
						</div>

						<div class="d-flex justify-content-between">
						  <p class="mb-2">Delivery</p>
						  <p class="mb-2 cart-delivery"></p>
						</div>

						<div class="d-flex justify-content-between mb-4">
						  <p class="mb-2">Total(Incl. taxes)</p>
						  <p class="mb-2 cart-totalinc"></p>
						</div>

						<button type="button" type="submit" id="btn-process-checkout" item="cart" class="btn btn-info btn-block btn-lg">
						  <div class="d-flex justify-content-between">
							<span  class="cart-grandtotal"></span>
							<span>Process <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
						  </div>
						</button>

					  </div>
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