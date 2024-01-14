@extends('orders.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
  <div class="card"> 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Orders') }} </span>
	@if(Auth::user()->type == "admin")
    <a href="{{config('app.url')}}/orders/create" class="btn btn-secondary pull-right">Create New</a></h2>
	@else
    <a href="{{config('app.url')}}/flowers" class="btn btn-secondary pull-right">Create New</a></h2>			
	@endif	
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Stable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-warning">
              <th>ID</th>
              <th>Date</th>
			  <th>SKU</th>
			  <th>Items List</th>
              <th>SubTotal</th>
			  <th>Special Request</th>
			  @if(Auth::user()->type == "admin")
			  <th>User Id</th>	
			   @endif
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($orders)
            @foreach($orders as $od)
            <tr>
				<td>{{$od->id}}</td>
				<td>{{$od->orderDate}}</td>
				<td>{{$od->sku}}</td>
				<td>{{$od->items}}</td>
				<td>{{$od->subTotal}}</td>
                <td>{{$od->sRequest}}</td>
				@if(Auth::user()->type == "admin")
                <td>{{$od->user_id}}</td>
				@endif
                <td>
					<a href="orders/{{$od->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
				</td>
            </tr>
            @endforeach
 	@else
	<tr>
	<td colspan="10"><p class="errortext">No record present</p></td>
	</tr>

	@endif

        </tbody>
<tfoot>
 	<tr>
		<td colspan="3" class="footnotes"></td>
		<td colspan="4" class="footnotes">{{ $orders->links() }}</td>
		<td colspan="3" class="footnotes"><span>Current Page:{{ $orders->currentPage()}}</span></td>
	</tr>
</tfoot>

    </table>
 </div>   
</div>
</div>
</div>
@endsection