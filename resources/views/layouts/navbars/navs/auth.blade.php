<!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-warning">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href=""> </a>
        <a class="navbar-brand brand-logo-mini" href=""><img src="{{ asset('skydash/images/logo-mini.svg') }}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
			<form class="navbar-form searchForm" method="GET" action="{{$activePage}}">		  
				<div class="input-group">
				  <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
					<button type="submit" id="search-btn" name="Search" class="input-group-text">
					  <i class="icon-search"></i>
					</button>
				  </div>
				  <input type="text" class="form-control" id="search_text" name="search_text" placeholder="Search now" aria-label="search" aria-describedby="search">
				</div>
			</form>	
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
		@if(Auth::user()->type !== "admin")
			<li class="nav-item dropdown">
				<a class="nav-link count-indicator getCart" id="getCart" href="{{ url('cart') }}" >
					<i class="fa fa-shopping-cart mx-0"></i>
					<span class="count"></span>
				</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link count-indicator getList" id="getList" href="{{ url('list') }}" >
					<i class="fa fa-list-ul mx-0"></i>
					<span class="count"></span>
				</a>
			</li>			
		@endif		
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item" href="{{ url('notifications/1') }}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal not1">New Message Updates</h6>
                </div>
              </a>
              <a class="dropdown-item preview-item" href="{{ url('notifications/2') }}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal not2">New Flowers Updates</h6>
                </div>
              </a>
              <a class="dropdown-item preview-item" href="{{ url('notifications/3') }}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal not3">New Bouquets Updates</h6>
                </div>
              </a>
              <a class="dropdown-item preview-item" href="{{ url('notifications/4') }}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-danger">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal not4">New Florists Updates</h6>
                </div>
              </a>			  
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-layout menu-icon mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Reports</p>
              <a class="dropdown-item preview-item" href="{{ url('subsReports') }}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-envelope mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">My Bookings</h6>
                </div>
              </a>
              <a class="dropdown-item preview-item" href="{{ url('clientsReports') }}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-primary">
                    <i class="ti-book mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">My Orders</h6>
                </div>
              </a>
              <a class="dropdown-item preview-item" href="{{ url('messagesReports') }}">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-download mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Messages</h6>
                </div>
              </a>			  
            </div>
          </li>		  
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('skydash/images/faces/face28.jpg') }}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ url('profiles') }}">
                <i class="ti-user text-primary"></i>
                Profile
              </a>			
			@if(Auth::user()->type == 'Admin')			  
              <a class="dropdown-item" href="{{ url('appDefaults') }}">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
			  <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('emails') }}">
                <i class="ti-envelope text-primary"></i>
                Emails
              </a>	
			 @endif
			  <div class="dropdown-divider"></div>			  
              <a class="dropdown-item" href="{{ url('logout') }}" id="logout-link">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>		  
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
<!-- partial -->
