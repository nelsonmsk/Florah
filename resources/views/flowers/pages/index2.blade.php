@extends('flowers.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Flowers') }} </span> 
    <a href="{{config('app.url')}}/flowers/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
	@if($flowers)
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
				@foreach($flowers as $fl)
				<tr>
					<td>{{$fl->id}}</td>
					<td>{{$fl->type}}</td>
					<td>{{$fl->name}}</td>						
					<td>{{$fl->sku}}</td>				
					<td>{{$fl->description}}</td>
					<td>{{$fl->price}}</td>				
					<td>
						<a href="flowers/{{$fl->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
					</td>
				</tr>
				@endforeach	
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" class="footnotes"></td>
				<td colspan="4" class="footnotes">{{ $flowers->links() }}</td>
				<td colspan="2" class="footnotes"><span>Current Page:{{ $flowers->currentPage()}}</span></td>
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