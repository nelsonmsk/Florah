@extends('bouquetTypes.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Edit BouquetType') }} </span>
	<a href="{{config('app.url')}}/bouquetTypes" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="bouquetTypes-form2" method="post" action="bouquetTypes"  data-parsley-validate>
      <div class="form-group">
		 <input type="hidden" value="{{csrf_token()}}" id="_token" name="_token" />	  
         <input type="hidden" id="id" value="{{$bouquetType->id}}" name="id" />			   				
       <label for="name" class="col-sm-2 control-label">Name:</label>
		<div class="col-sm-10">
		  <input id="name" type="text"  class="form-control" name="name" value="{{$bouquetType->name}}" required />
		</div>
      </div>	  
      <div id="b-element" class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-primary btn-lg col-sm-5" id="submit" name="Update">Update <div class="fa fa-save text-white"></div></button>
		  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>
		</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
