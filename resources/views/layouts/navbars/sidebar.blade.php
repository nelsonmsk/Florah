<!-- partial:partials/_sidebar.html -->
	<nav class="sidebar sidebar-offcanvas" id="sidebar">
	@if(Auth::user()->isAdmin())
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">App Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('profiles')}}">Profiles</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('users')}}">Manage</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('orders')}}">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('hires')}}">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Hires</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#flower" aria-expanded="false" aria-controls="flower">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Flowers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="flower">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('flowers')}}">Flowers</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('flowerTypes')}}">FlowerTypes</a></li>
              </ul>
            </div>
          </li>		  
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bouquet" aria-expanded="false" aria-controls="bouquet">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Bouquets</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="bouquet">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('bouquets')}}">Bouquets</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('bouquetTypes')}}">BouquetTypes</a></li>
              </ul>
            </div>
          </li>		  		  
          <li class="nav-item">
            <a class="nav-link" href="{{url('florists')}}">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Florists</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('messages')}}">
              <i class="icon-inbox menu-icon"></i>
              <span class="menu-title">Messages</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('services')}}">
              <i class="icon-cog menu-icon"></i>
              <span class="menu-title">Services</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('galleryImages')}}">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Images Gallery</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#more" aria-expanded="false" aria-controls="more">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">More</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="more">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('banners')}}"> Banners </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('features')}}"> Features </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('plans')}}"> Plans & Pricing </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('testimonials')}}"> Testimonials </a></li>			
              </ul>
            </div>
          </li>
        </ul>
@else
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('profiles')}}">
              <i class="icon-star menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('galleryImages/create')}}">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Upload Profile Image</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('orders')}}">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">My Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('hires')}}">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">My Hires</span>
            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="{{url('flowers')}}">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Order Flowers </span>
            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="{{url('bouquets')}}">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Order Bouquets </span>
            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="{{url('florists')}}">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Hire a Florist </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('messages')}}">
              <i class="icon-inbox menu-icon"></i>
              <span class="menu-title">Messages</span>
            </a>
          </li>	  
        </ul>	
@endif
	
    </nav>
<!-- partial -->