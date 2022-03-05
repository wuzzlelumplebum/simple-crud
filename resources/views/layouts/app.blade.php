<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Test CRUD</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

	<script src="assets/js/app.js"></script>
	<script src="{{ asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/streamgraph.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/sparklines.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/lines.js') }}"></script>	
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/areas.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/donuts.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/bars.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/progress.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/heatmaps.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/pies.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/dark/bullets.js') }}"></script>
	<!-- /theme JS files -->
</head>
<body>
    <!-- Navbar -->
    @if (Route::has('login'))
        @auth
            <div class="navbar navbar-expand-md navbar-light navbar-static">
        
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                                <i class="icon-paragraph-justify3"></i>
                            </a>   
                        </li>
                        <li>
                            <a class="navbar-nav-link d-flex align-items-center" href="{{ route('home') }}">
                                Simple CRUD
                            </a>
                        </li>
                    </ul>
                
                    <span class="badge my-3 my-md-0 ml-md-3 mr-md-auto"> </span>
                
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item">              
                                <a class="navbar-nav-link d-flex align-items-center" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="navbar-nav-link d-flex align-items-center" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown dropdown-user">
                                
                                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('users.show',Auth::user()->id) }}" class="dropdown-item"><i class="icon-user"></i> My profile</a>
                                    <a href="{{ route('users.edit',Auth::user()->id) }}" class="dropdown-item"><i class="icon-cog"></i> Account settings</a>
                                    <a href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); 
                                        document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> {{ ('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        @endauth
    @endif
    <!-- Navbar -->

    <div class="page-content">
        <!-- Sidebar -->
        @if (Route::has('login'))
        @auth
            <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

                <!-- Sidebar mobile toggler -->
                <div class="sidebar-mobile-toggler text-center">
                    <a href="#" class="sidebar-mobile-main-toggle">
                        <i class="icon-arrow-left8"></i>
                    </a>
                    Navigation
                    <a href="#" class="sidebar-mobile-expand">
                        <i class="icon-screen-full"></i>
                        <i class="icon-screen-normal"></i>
                    </a>
                </div>
                <!-- /sidebar mobile toggler -->
                    
                <!-- Sidebar content -->
                <div class="sidebar-content">
            
                    <!-- User menu -->
                    <div class="sidebar-user">
                        <div class="card-body">
                            <div class="media">
                                <div class="mr-3">
                                    <a href="{{ route('users.show',Auth::user()->id) }}"><img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" width="38" height="38" class="rounded-circle" alt=""></a>
                                </div>
                
                                <div class="media-body">
                                    <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                                    <div class="font-size-xs opacity-50">
                                        <i class="icon-pin font-size-sm"></i> &nbsp;{{ Auth::user()->alamat }}
                                    </div>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /user menu -->
                
                    <!-- Main navigation -->
                    <div class="card card-sidebar-mobile">
                        <ul class="nav nav-sidebar" data-nav-type="accordion">
            
                            <!-- Main -->
                            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
                                    <i class="icon-home"></i>
                                    <span>
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                            <!-- /main -->
                            
                            <!-- Control -->
                            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Control</div> <i class="icon-menu" title="Main"></i></li>
                            <li class="nav-item">
                                <a href="{{ route('users.show',Auth::user()->id) }}" class="nav-link {{ request()->is('users/*') ? 'active' : '' }}">
                                    <i class="icon-user"></i>
                                    <span>
                                        My Profile
                                    </span>
                                </a>
                                <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                                    <i class="icon-users"></i>
                                    <span>
                                        Employees Data
                                    </span>
                                </a>
                                </li>
                            <!-- /control -->
                
                        </ul>
                    </div>
                    <!-- /main navigation -->
                
                </div>
                <!-- /sidebar content -->
                    
            </div>
        @endauth
        @endif
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="content-wrapper">

            <!-- Content Area -->
            <div class="content">
                @yield('content')
            </div>
            <!-- Content Area -->

        </div>
        <!-- Main Content -->

    </div>
</body>
</html>
