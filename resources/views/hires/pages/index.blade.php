@extends('hires.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Hires') }} </span>
	@if(Auth::user()->type == "admin")
	<a href="{{ config('app.url') }}/hires/create" class="btn btn-secondary pull-right">Create New</a></h2>
	@else
    <a href="{{config('app.url')}}/florists" class="btn btn-secondary pull-right">Create New</a></h2>			
	@endif
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Rtable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
			  <th>From Date</th>
			  <th>From Time</th>
			  <th>To Date</th>
			  <th>To Time</th>	
			  <th>Cost</th>
			  @if(Auth::user()->type == "admin")
			  <th>User Id</th>
			  @endif
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($hires)
            @foreach($hires as $hr)
            <tr>
				<td>{{$hr->id}}</td>
				<td>{{$hr->fromDate}}</td>
				<td>{{$hr->fromTime}}</td>
				<td>{{$hr->toDate}}</td>
				<td>{{$hr->toTime}}</td>
				<td>{{$hr->hireCost}}</td>
				@if(Auth::user()->type == "admin")
				<td>{{$hr->user_id}}</td>	
				@endif
                <td>
					<a href="hires/{{$hr->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="2" class="footnotes"></td>
		<td colspan="4" class="footnotes">{{ $hires? $hires->links():'' }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $hires? $hires->currentPage():''}}</span></td>
	</tr>
</tfoot>
    </table>
 </div>   
</div>
</div>
</div>
@endsection