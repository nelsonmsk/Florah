@extends('florists.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
     <div class="card">
	 
	<div class="card-header header-danger">
    <h2><span class="card-category">{{ __('Florists') }} </span>
	<a href="{{ config('app.url') }}/florists/create" class="btn btn-secondary pull-right">Create New</a></h2>
    </div>

<div class="card-body">
<div class =" table-responsive" id = "Rtable">
    <table class="table table-condensed table-striped" >
        <thead>
            <tr class="tr-danger">
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
			  <th>Bio</th>	
              <th>Experience</th>
			  <th>Speciality</th>
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>

	@if($florists)
            @foreach($florists as $fs)
            <tr>
				<td>{{$fs->id}}</td>
				<td>{{$fs->name}}</td>
                <td>{{$fs->email}}</td>
				<td>{{$fs->phone}}</td>
				<td>{{$fs->bio}}</td>
				<td>{{$fs->experience}}</td>
				<td>{{$fs->speciality}}</td>				
                <td>
					<a href="florists/{{$fs->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
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
		<td colspan="4" class="footnotes">{{ $florists? $florists->links():'' }}</td>
		<td colspan="2" class="footnotes"><span>Current Page:{{ $florists? $florists->currentPage():''}}</span></td>
	</tr>
</tfoot>
    </table>
 </div>   
</div>
</div>
</div>
@endsection