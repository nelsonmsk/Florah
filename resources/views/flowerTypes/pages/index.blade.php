@extends('flowerTypes.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('FlowerTypes') }} </span> 
    <a href="{{config('app.url')}}/flowerTypes/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class ="table-responsive" id = "Stable">
			@if($flowerTypes)
    <table class="table table-condensed table-striped" >	
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>			  
              <th >Actions</th>
            </tr>
        </thead>
        <tbody>
			@foreach($flowerTypes as $ft)
			<tr>
				<td>{{$ft->id}}</td>
				<td>{{$ft->name}}</td>				
				<td>
					<a href="flowerTypes/{{$ft->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="1" class="footnotes"></td>
				<td colspan="1" class="footnotes">{{ $flowerTypes->links() }}</td>
				<td colspan="1" class="footnotes"><span>Current Page:{{ $flowerTypes->currentPage()}}</span></td>
			</tr>
		</tfoot>

    </table>
		@else	
			<div class="row">
				<h2>No FlowerTypes Found</h2>
			</div>
	@endif	
 </div>   
</div>
</div>
</div>
@endsection