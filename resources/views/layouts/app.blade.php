
<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="env" content="{{ config('app.url') }}">
    <title>{{ config('app.name') }}</title>

    <!-- Styles  -->
	<!--=== Google Fonts ===-->
	<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:600,400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	
	<!--=== Off-canvas-sidebar plugins Files ===-->		
	<link href="{{ asset('css/parsley.css') }}" rel="stylesheet"> 	
	<link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">	
	<link href="{{ asset('css/fancy-buttons.css') }}" rel="stylesheet">
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/jquery.vegas.css') }}" rel="stylesheet" >	
	<link href="{{ asset('css/baraja.css') }}" rel="stylesheet"/>
    <link href="{{ asset('plugins/linericon/style.css') }}" rel="stylesheet">	
    <link href="{{ asset('plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet" >	
	<link href="{{ asset('plugins/boxicons/css/boxicons.min.css') }}" rel="stylesheet">		
	<link href="{{ asset('plugins/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/swiper/swiper-bundle.min.css') }}" rel="stylesheet">	
	<link href="{{ asset('plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet">

	<!--=== Main panel plugins ===-->	
	<link href="{{ asset('skydash/vendors/feather/feather.css') }}" rel="stylesheet">		
	<link href="{{ asset('skydash/vendors/ti-icons/css/themify-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('skydash/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">	
	<link href="{{ asset('skydash/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" rel="stylesheet"/>	
	<link href="{{ asset('skydash/js/select.dataTables.min.css') }}" rel="stylesheet">		
	
	<!--=== Main Stylesheets ===-->	
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('skydash/css/vertical-layout-light/style.css') }}" rel="stylesheet"> 	
	<link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>
	
</head>


<body class="{{ $class ?? '' }}">

	@if (Route::has('login'))
       @auth   
	   		   	<form id="logoutForm" action="logout" method="POST" style="display: none;">
				{{csrf_token()}}
			   </form> 
			  @include('layouts.page_templates.auth')   
	   @else
			   @include('layouts.page_templates.guest')
		@endauth
    @endif
	
	
 <!--==== main-panel scripts ====-->
	<script src="{{ asset('skydash') }}/vendors/js/vendor.bundle.base.js"></script>
	<script src="{{ asset('skydash') }}/vendors/chart.js/Chart.min.js"></script>	
	<script src="{{ asset('skydash') }}/vendors/datatables.net/jquery.dataTables.js"></script>
	<script src="{{ asset('skydash') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
	<script src="{{ asset('skydash') }}/js/dataTables.select.min.js"></script>	
	<script src="{{ asset('skydash') }}/js/off-canvas.js"></script>
	<script src="{{ asset('skydash') }}/js/hoverable-collapse.js"></script>
	<script src="{{ asset('skydash') }}/js/template.js"></script>	
	<script src="{{ asset('skydash') }}/js/settings.js"></script>
	<script src="{{ asset('skydash') }}/js/todolist.js"></script>
	<script src="{{ asset('skydash') }}/js/dashboard.js"></script>	
	<script src="{{ asset('skydash') }}/js/Chart.roundedBarCharts.js"></script>	
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

	<!-- main Scripts -->	
	<script src="{{ asset('js/main.js') }}"></script>

 <!--==== off-canvas-sidebar scripts ====-->  
   <!--==== Essential files ====-->
	<script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrapValidator.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/sweetalert2.js') }}"></script>
	<!--==== Slider and Card style plugin ====-->
	<script type="text/javascript" src="{{ asset('js/jquery.baraja.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('js/jquery.vegas.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
	<!--==== MailChimp Widget plugin ====-->
	<script type="text/javascript" src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
	<!--==== Scroll and navigation plugins ====-->
	<script type="text/javascript" src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.nav.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
	<!-- Waypoint and Counters--> 
	<script type="text/javascript" src="{{ asset('plugins/counter/waypoints.min.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('plugins/counter/jquery.counterup.min.js') }}"></script>
	<!-- Purecounter counter for statistics numbers -->	
	<script type="text/javascript" src="{{ asset('plugins/counter/purecounter.min.js') }}"></script> 
	<!-- Owl Carousel--> 
	<script type="text/javascript" src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('plugins/swiper/swiper-bundle.min.js') }}"></script> <!-- Swiper for image and text sliders -->
	<script src="{{ asset('plugins/isotope-layout/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('plugins') }}/dropzone/dist/dropzone-min.js"></script> 	
	
	<!--==== Custom Script files ====-->
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/list.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/checkout.js') }}"></script>
	 @stack('js')  

</body>

</html>
