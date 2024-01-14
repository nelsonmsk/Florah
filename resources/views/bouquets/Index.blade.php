
@extends('layouts.app', ['activePage' => 'bouquets', 'titlePage' => __('Bouquets')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection