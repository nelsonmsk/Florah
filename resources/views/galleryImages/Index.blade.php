
@extends('layouts.app', ['activePage' => 'galleryImages', 'titlePage' => __('Gallery Images')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
	@yield('body')
	</div>
  </div>
</div>
@endsection