@extends('hires.Index')

@section('body')
  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Add Hire') }} </span>
	<a href="{{config('app.url')}}/hires" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
	<div class="card-body">	
		<form class="form-horizontal singleForm" id="hires-form" method="post" action="hires" data-parsley-validate>
			<div class="form-group">
			<input type="hidden" value="{{csrf_token()}}" name="_token" />	
			  <label for="fromDate" class="col-sm-2 control-label">From Date:</label>
			<div class="col-sm-10">
			  <input id="fromDate" type="date"  class="form-control" name="fromDate" required />
			</div>
			  </div>
			  <div class="form-group">
			  <label for="fromTime" class="col-sm-2 control-label">From Time:</label>
			<div class="col-sm-10">
			  <input id="fromTime" type="time"  class="form-control" name="fromTime"  required />
			</div>
			  </div>	
			  <div class="form-group">
			  <label for="toDate" class="col-sm-2 control-label">To Date:</label>
			<div class="col-sm-10">
			  <input id="toDate" type="date"  class="form-control" name="toDate" required />
			</div>
			  </div>
			  <div class="form-group">
			  <label for="toTime" class="col-sm-2 control-label">To Time:</label>
			<div class="col-sm-10">
			  <input id="toTime" type="time"  class="form-control" name="toTime"  required />
			</div>
			  </div>
		  <div class="form-group">
			  <label for="hireCost" class="col-sm-2 control-label">{{ __('Cost') }}</label>
			  <div class="col-sm-10">
				  <input class="form-control" name="hireCost" id="hireCost" type="text" required />
			</div>
		  </div>
		  <div class="form-group">
			  <label for="hireDetails" class="col-sm-2 control-label">{{ __('Details') }}</label>
			  <div class="col-sm-10">
				  <textarea id="bio" name="hireDetails" class="form-control"></textarea>
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
