@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'cart','titlePage' => __('cart'),$rtemplate])

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container dark-bg">
        <h2>Shopping Cart</h2>
      </div>
    </section>
	<!-- End Breadcrumbs -->
	<!-- ======= Shopping Cart Section ======= -->
	<section class="h-100 h-custom cart-section" id="cart-section" style="background-color: #eee;">
	  <div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col">
			<div class="card">
			  <div class="card-body p-4">

				<div class="row cart">

				  <div class="col-lg-7">
					<h5 class="mb-3"><a href="{{url()->previous()}}" class="text-body cart-head"><i
						  class="fas fa-long-arrow-alt-left me-2"></i> Continue shopping</a></h5>
					<hr>
					<div class="d-flex justify-content-between align-items-center mb-4">
					  <div>
						<p class="mb-1">Shopping Cart</p>
						<p class="mb-0 cart-header"></p>
					  </div>
					  <div>
                            <a href="#"  id="clearCart" class="btn btn-md-4 btn-warning">Empty Cart 
                                <div class="fas fa-shopping-cart text-white"></div></a>
					  </div>
					</div><hr>
					<div class="card mb-3 cart-row">
					</div>
				  </div>
				  <div class="col-lg-5">

					<div class="card bg-primary text-white rounded-3">
					  <div class="card-body">
						<div class="align-items-center mb-4">
						  <h3 class="mb-0 cart-summary">Summary</h3>
						</div>
						<hr>
						<div class="mt-4 summary-body">
							<div class="d-flex justify-content-between">
							  <p class="mb-2 ">Items</p>
							  <p class="mb-2 summary-items"></p>
							</div>
							<div class="d-flex justify-content-between">
							  <p class="mb-2">Total</p>
							  <p class="mb-2 summary-total"></p>
							</div>
						</div>
						<hr class="my-4">

						<div class="d-flex justify-content-between">
						  <p class="mb-2 ">Subtotal</p>
						  <p class="mb-2 cart-subtotal"></p>
						</div>

						<div class="d-flex justify-content-between">
						  <p class="mb-2">Shipping</p>
						  <p class="mb-2 cart-shipping"></p>
						</div>

						<div class="d-flex justify-content-between mb-4">
						  <p class="mb-2">Total(Incl. taxes)</p>
						  <p class="mb-2 cart-totalinc"></p>
						</div>

						<a href="{{url('/checkoutCart')}}" id="btn-checkout-cart" class="btn btn-info btn-block btn-lg">
						  <div class="d-flex justify-content-between">
							<span  class="cart-grandtotal"></span>
							<span class="checkout-link">Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
						  </div>
						</a>

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
