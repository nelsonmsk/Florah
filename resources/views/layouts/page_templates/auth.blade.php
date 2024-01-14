<div class="container-scroller">

    @include('layouts.navbars.navs.auth')
	
	<div class="container-fluid page-body-wrapper">
	
		@include('layouts.navbars.sidebar')
	
		<div class="main-panel">
		 
			@yield('content')
		 
			@include('layouts.footers.auth')
		 
		</div>
	</div>

</div>