
@extends('layouts.app', ['activePage' => 'flowers', 'titlePage' => __('Flowers')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection