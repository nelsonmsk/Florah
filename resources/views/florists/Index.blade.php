
@extends('layouts.app', ['activePage' => 'florists', 'titlePage' => __('Florists')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection