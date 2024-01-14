<!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top d-block navbar-transparent" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container "><a class="navbar-brand" href="{{ config('app.url')}}">{{$rtemplate['appDefaults']->appTitle}}</a>
          <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navigation-index"  aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse  border-lg-0 mt-4 mt-lg-0 justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link fw-medium active" aria-current="page" href="#home">Home</a></li>
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="#works">How It Works</a></li>
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="#features">Features</a></li>
              <li class="nav-item" data-anchor="data-anchor"><a class="nav-link btn btn-warning btn-fs btn-solid-lg" href="{{ config('app.url') }}/login">login</a></li>			
              <li class="nav-item" data-anchor="data-anchor"><a class="nav-link btn btn-fs btn-plain-lg" href="{{ config('app.url') }}/register">Register</a></li>
			</ul>
          </div>
        </div>
      </nav>
<!-- End Navbar -->