@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'list','titlePage' => __('list'),$rtemplate])

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container dark-bg">
        <h2>Hiring List</h2>
      </div>
    </section>
	<!-- End Breadcrumbs -->
	<!-- ======= Hiring List Section ======= -->
	<section class="h-100 h-custom list-section" id="list-section" style="background-color: #eee;">
	  <div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-hires-center h-100">
		  <div class="col">
			<div class="card">
			  <div class="card-body p-4">

				<div class="row list">

				  <div class="col-lg-7">
					<h5 class="mb-3"><a href="{{url()->previous()}}" class="text-body list-head"><i
						  class="fas fa-long-arrow-alt-left me-2"></i> Continue hiring</a></h5>
					<hr>
					<div class="d-flex justify-content-between align-hires-center mb-4">
					  <div>
						<p class="mb-1">Hiring List</p>
						<p class="mb-0 list-header"></p>
					  </div>
					  <div>
                            <a href="#"  id="clearList" class="btn btn-md-4 btn-danger">Empty List 
                                <div class="fas fa-list-ul text-white"></div></a>
					  </div>
					</div><hr>
					<div class="card mb-3 list-row">
					</div>
				  </div>
				  <div class="col-lg-5">

					<div class="card bg-secondary text-white rounded-3">
					  <div class="card-body">
						<div class="align-hires-center mb-4">
						  <h3 class="mb-0 list-summary">Summary</h3>
						</div>
						<hr>
						<div class="mt-4 summary-body">
							<div class="d-flex justify-content-between">
							  <p class="mb-2 ">Hires</p>
							  <p class="mb-2 summary-hires"></p>
							</div>
							<div class="d-flex justify-content-between">
							  <p class="mb-2">Hours</p>
							  <p class="mb-2 summary-hours"></p>
							</div>							
							<div class="d-flex justify-content-between">
							  <p class="mb-2">Total</p>
							  <p class="mb-2 summary-total"></p>
							</div>
						</div>
						<hr class="my-4">

						<div class="d-flex justify-content-between">
						  <p class="mb-2 ">Subtotal</p>
						  <p class="mb-2 list-subtotal"></p>
						</div>

						<div class="d-flex justify-content-between">
						  <p class="mb-2">Transport</p>
						  <p class="mb-2 list-transport"></p>
						</div>

						<div class="d-flex justify-content-between mb-4">
						  <p class="mb-2">Total(Incl. taxes)</p>
						  <p class="mb-2 list-totalinc"></p>
						</div>

						<a href="{{url('/checkoutList')}}" id="btn-checkout-list" class="btn btn-info btn-block btn-lg">
						  <div class="d-flex justify-content-between">
							<span  class="list-grandtotal"></span>
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
<!-- End Hiring List Section -->
@endsection
