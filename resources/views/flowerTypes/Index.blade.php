
@extends('layouts.app', ['activePage' => 'flowerTypes', 'titlePage' => __('FlowerTypes')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection