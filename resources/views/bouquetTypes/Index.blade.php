
@extends('layouts.app', ['activePage' => 'bouquetTypes', 'titlePage' => __('BouquetTypes')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection