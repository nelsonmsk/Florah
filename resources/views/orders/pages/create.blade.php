@extends('orders.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Add Order') }} </span> 
	<a href="{{config('app.url')}}/orders" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="orders-form" method="post" action="orders" data-parsley-validate>
      <div class="form-group">
      <input type="hidden" value="{{csrf_token()}}" name="_token" />
      <label for="orderDate" class="col-sm-2 control-label">Date:</label>
		<div class="col-sm-10">
		  <input id="orderDate" type="date"  class="form-control" name="orderDate" required />
		</div>
      </div>
      <div class="form-group">  
      <label for="items" class="col-sm-2 control-label">Items</label>
		<div class="col-sm-10">
		  <textarea id="items" class="form-control" name="items" ></textarea>
		</div>
      </div>
      <div class="form-group">
      <label for="subTotal" class="col-sm-2 control-label">SubTotal:</label>
		<div class="col-sm-10">
		  <input id="subTotal" type="text"  class="form-control" name="subTotal" required />
		</div>
      </div>	
      <div class="form-group">
      <label for="sRequest" class="col-sm-2 control-label">S.Request:</label>
		<div class="col-sm-10">
		  <textarea id="sRequest" class="form-control" name="sRequest" ></textarea>
		</div>
      </div>	
		<div class="form-group">
			<label for="status" class="col-sm-2 control-label">{{ __('Status') }}</label>
			<div class="col-sm-10">
			  <input id="status" type="text"  class="form-control" name="status"  required>
			</div>
		</div>	  
      <div id="b-element" class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save-btn" name="Save">Save <div class="fa fa-save text-white"></div></button>
		  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">{{ __('Cancel') }} <div class="fa fa-close text-white"></div></a>
		</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
