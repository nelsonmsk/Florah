@extends('bouquets.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Bouquets') }} </span> 
    <a href="{{config('app.url')}}/bouquets/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
	@if($bouquets)
    <table class="table table-condensed table-striped" >	
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Type</th>
			  <th>Name</th>
              <th>SKU</th>			  
              <th>Description</th>
              <th>Price</th>			  
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>
				@foreach($bouquets as $bq)
				<tr>
					<td>{{$bq->id}}</td>
					<td>{{$bq->type}}</td>
					<td>{{$bq->name}}</td>						
					<td>{{$bq->sku}}</td>				
					<td>{{$bq->description}}</td>
					<td>{{$bq->price}}</td>				
					<td>
						<a href="bouquets/{{$bq->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
					</td>
				</tr>
				@endforeach	
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" class="footnotes"></td>
				<td colspan="4" class="footnotes">{{ $bouquets->links() }}</td>
				<td colspan="2" class="footnotes"><span>Current Page:{{ $bouquets->currentPage()}}</span></td>
			</tr>
		</tfoot>

    </table>
		@else	
			<div class="row">
						<h2>No Profile Found</h2>
			</div>
	@endif	
 </div>   
</div>
</div>
</div>
@endsection