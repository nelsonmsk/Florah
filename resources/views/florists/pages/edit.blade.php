@extends('florists.Index')

@section('body')
  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Edit Florist') }} </span>
	<a href="{{config('app.url')}}/florists" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="florists-form" method="post" action="florists" data-parsley-validate>
		<div class="form-group">
			<input type="hidden" value="{{csrf_token()}}" name="_token" />	
			<input type="hidden" value="{{$florist->id}}" id="id" name="id" />				
			<input type="hidden" value="{{$florist->username}}" name="username" />				
		  <label for="name" class="col-sm-2 control-label">{{ __('Name') }}</label>
		  <div class="col-sm-10">
			  <input class="form-control" name="name" id="name" type="text"  value="{{ $florist->name }}" required />
		  </div>
		</div>
		<div class="form-group">
		  <label for="email" class="col-sm-2 control-label">{{ __('Email') }}</label>
		  <div class="col-sm-10">
			  <input class="form-control" name="email" id="email" type="email"  value="{{ $florist->email }}" required />
		</div>
	  </div>
	  <div class="form-group">
		  <label for="phone" class="col-sm-2 control-label">{{ __('Phone') }}</label>
		  <div class="col-sm-10">
			  <input class="form-control" name="phone" id="phone" type="tel"  value="{{$florist->phone}}" required />
		</div>
	  </div>
	  <div class="form-group">
		  <label for="bio" class="col-sm-2 control-label">{{ __('Bio') }}</label>
		  <div class="col-sm-10">
			  <textarea id="bio" name="bio" class="form-control">{{$florist->bio}} </textarea>
		</div>
	  </div>
		<div class="form-group">
			<label for="experience" class="col-sm-2 control-label">{{ __('Experience') }}</label>
			<div class="col-sm-10">
			  <input id="experience" type="text"  class="form-control" name="experience" value="{{$florist->experience}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="speciality" class="col-sm-2 control-label">{{ __('Speciality') }}</label>
			<div class="col-sm-10">
			  <input id="speciality" type="text"  class="form-control" name="speciality" value="{{$florist->speciality}}" required>
			</div>
		</div>	  
		<div class="form-group">
			<label for="rates" class="col-sm-2 control-label">{{ __('Rates per hr') }}</label>
			<div class="col-sm-10">
			  <input id="rates" type="text"  class="form-control" name="rates" value="{{$florist->rates}}" required>
			</div>
		</div>	
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg col-sm-5" id="save-btn" name="Update">Update <div class="fa fa-save text-white"></div></button>
      <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">{{ __('Cancel') }} <div class="fa fa-close text-white"></div></a>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
