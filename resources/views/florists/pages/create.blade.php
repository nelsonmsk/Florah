@extends('florists.Index')

@section('body')
  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Add Florist') }} </span>
	<a href="{{config('app.url')}}/florists" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="florists-form" method="post" action="florists" data-parsley-validate>
		<div class="form-group">
			<input type="hidden" value="{{csrf_token()}}" name="_token" />	
		  <label class="col-sm-2 control-label">{{ __('Name') }}</label>
		  <div class="col-sm-10">
			  <input class="form-control" name="name" id="name" type="text"  required />
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-sm-2 control-label">{{ __('Email') }}</label>
		  <div class="col-sm-10">
			  <input class="form-control" name="email" id="email" type="email" required />
		</div>
	  </div>
	  <div class="form-group">
		  <label class="col-sm-2 control-label">{{ __('Phone') }}</label>
		  <div class="col-sm-10">
			  <input class="form-control" name="phone" id="phone" type="tel" required />
		</div>
	  </div>
	  <div class="form-group">
		  <label class="col-sm-2 control-label">{{ __('Bio') }}</label>
		  <div class="col-sm-10">
			  <textarea id="bio" name="bio" class="form-control"></textarea>
		</div>
	  </div>
		<div class="form-group">
			<label for="experience" class="col-sm-2 control-label">{{ __('Experience') }}</label>
			<div class="col-sm-10">
			  <input id="experience" type="text"  class="form-control" name="experience"  required>
			</div>
		</div>
		<div class="form-group">
			<label for="speciality" class="col-sm-2 control-label">{{ __('Speciality') }}</label>
			<div class="col-sm-10">
			  <input id="speciality" type="text"  class="form-control" name="speciality"  required>
			</div>
		</div>	
		<div class="form-group">
			<label for="rates" class="col-sm-2 control-label">{{ __('Rates per hr') }}</label>
			<div class="col-sm-10">
			  <input id="rates" type="text"  class="form-control" name="rates" required>
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
