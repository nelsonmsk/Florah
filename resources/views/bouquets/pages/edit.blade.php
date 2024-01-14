@extends('bouquets.Index')

@section('body')

  <div class="col-lg-8 col-md-10 col-md-offset-2">
    <div class="card">
	   
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Edit Bouquet') }} </span>
	<a href="{{config('app.url')}}/bouquets" class="btn btn-secondary pull-right">View All</a></h2>
    </div>
	
<div class="card-body">	
    <form class="form-horizontal singleForm" id="bouquets-form2" method="post" action="bouquets"  data-parsley-validate>
      <div class="form-group">
		 <input type="hidden" value="{{csrf_token()}}" id="_token" name="_token" />	  
         <input type="hidden" id="id" value="{{$bouquet->id}}" name="id" />			   
		 <input type="hidden" id="username" value="{{$bouquet->username}}" name="username" />				
      <label for="name" class="col-sm-2 control-label">Name:</label>
		<div class="col-sm-10">
		  <input id="name" type="text"  class="form-control" name="name" value="{{$bouquet->name}}" required />
		</div>
      </div>
      <div class="form-group">    
		  <label for="type" class="col-sm-2 control-label">Type:</label>
			<div class="col-sm-10">
			 @if($bouquetTypes->count() != 0)
			  <select class="form-control" name="type" >
					@foreach($bouquetTypes as $bq)
						@if( $bq->name == "{{$bouquet->type}}" )
							<option value="{{$bq->name}}" selected>{{$bq->name}}</option>
						@else
							<option value="{{$bq->name}}">{{$bq->name}}</option>							
						@endif
					@endforeach
			  </select> 
			@else
				<input id="type" type="text"  class="form-control" name="type" required /> 
			@endif  
			</div>
      </div>	  
      <div class="form-group">
		<label for="sku" class="col-sm-2 control-label">SKU:</label>
		<div class="col-sm-10">
		  <input id="sku" type="text"  class="form-control" name="sku" value="{{$bouquet->sku}}" required />
		</div>
      </div>	 
      <div class="form-group">
		  <label for="description" class="col-sm-2 control-label">Description:</label>
			<div class="col-sm-10">
			  <textarea id="description" class="form-control" name="description" >{{$bouquet->description}}</textarea>
			</div>
      </div>		
      <div class="form-group">
		<label for="price" class="col-sm-2 control-label">Price:</label>
		<div class="col-sm-10">
		  <input id="price" type="text"  class="form-control" name="price" value="{{$bouquet->price}}" required />
		</div>
      </div> 	  	  
      <div id="b-element" class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg col-sm-5" id="save-btn" name="Update">Update <div class="fa fa-save text-white"></div></button>
      <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>
	</div>
      </div>
  </form> 
</div> 
</div>
</div>
@endsection
