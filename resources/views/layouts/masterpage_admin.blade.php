<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title', 'JOB4U')</title>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin-template/css/material-dashboard.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('admin-template/css/mp_custom.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('summernote-0.8.9-dist/summernote-lite.css')}}">

	{{-- <link rel="stylesheet" type="text/css" href="{{asset('admin-template/assets-for-demo/demo.css')}}"> --}}

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-color="azure" data-background-color="black" data-image="{{asset('admin-template/img/sidebar-1.jpg')}}">
		<!--
	        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

	        Tip 2: you can also add an image using data-image tag
	    -->
	    <div class="logo">
	    	
    		@switch(Auth::user()->role_id)
    			@case(1)
			        <a href="http://www.creative-tim.com" class="simple-text logo-mini">AD </a>
    				<a href="{{route('admin.viewdashboard')}}" class="simple-text logo-normal">Admin</a>
    				@break
    			@case(2)
			        <a href="http://www.creative-tim.com" class="simple-text logo-mini">CC</a>
    				<a href="{{route('admin.viewdashboard')}}" class="simple-text logo-normal">UTMCC</a>
    				@break
    			@case(3)
			        <a href="http://www.creative-tim.com" class="simple-text logo-mini">A</a>
    				<a href="{{route('admin.viewdashboard')}}" class="simple-text logo-normal">UTM Alumni</a>
    				@break
    			@default
			        <a href="http://www.creative-tim.com" class="simple-text logo-mini">JOB4U</a>
    				<a href="{{route('admin.viewdashboard')}}" class="simple-text logo-normal">UTM</a>
    				@break
    		@endswitch
	    	
	    </div>
	    <div class="sidebar-wrapper">
	    	<div class="user">
	    		<div class="photo">
	    			<img src="{{asset('img/profile_picture.jpg')}}" />
	    		</div>
	    		<div class="user-info">
	    			<a data-toggle="collapse" href="#collapseExample" class="username">
	    				<span>
	    					{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
	    					<b class="caret"></b>
	    				</span>
	    			</a>
	    			<div class="collapse" id="collapseExample">
	    				<ul class="nav">
	    					<li class="nav-item">
	    						<a class="nav-link" href="#">
	    							<span class="sidebar-mini"> S </span>
	    							<span class="sidebar-normal"> Settings </span>
	    						</a>
	    					</li>
	    					<li class="nav-item">
	    						<a class="nav-link" href="{{ route('logout') }}"
	                           			onclick="event.preventDefault();
                                     	document.getElementById('logout-form').submit();">
	    							<span class="sidebar-mini"> LG </span>
	    							<span class="sidebar-normal"> Logout </span>
	    						</a>

	                        	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                            	@csrf
	                        	</form>
	    					</li>
	    				</ul>
	    			</div>
	    		</div>
	    	</div>
	    	<ul class="nav">
	    		@if(Auth::user()->role_id != 3)
	    		<li class="nav-item ">
	    			<a class="nav-link" data-toggle="collapse" href="#companies">
	    				<i class="material-icons">store_mall_directory</i>
	    				<p> Companies
	    					<b class="caret"></b>
	    				</p>
	    			</a>
	    			<div class="collapse" id="companies">
	    				<ul class="nav">
	    					<li class="nav-item ">
	    						<a class="nav-link" href="{{route('admin.listverifycompany')}}">
	    							<span class="sidebar-mini"> VC </span>
	    							<span class="sidebar-normal"> Verify Company </span>
	    						</a>
	    					</li>
	    					<li class="nav-item ">
	    						<a class="nav-link" href="{{route('admin.viewallcompany')}}">
	    							<span class="sidebar-mini"> AC </span>
	    							<span class="sidebar-normal"> All Company </span>
	    						</a>
	    					</li>
	    					<li class="nav-item ">
	    						<a class="nav-link" href="{{route('admin.viewalljob')}}">
	    							<span class="sidebar-mini"> AJ </span>
	    							<span class="sidebar-normal"> All Job </span>
	    						</a>
	    					</li>
	    				</ul>
	    			</div>
	    		</li>
	    		<li class="nav-item ">
	    			<a class="nav-link" data-toggle="collapse" href="#applications">
	    				<i class="material-icons">folder_shared</i>
	    				<p> Applications
	    					<b class="caret"></b>
	    				</p>
	    			</a>
	    			<div class="collapse" id="applications">
	    				<ul class="nav">
	    					<li class="nav-item ">
	    						<a class="nav-link" href="">
	    							<span class="sidebar-mini"> AA </span>
	    							<span class="sidebar-normal"> All Applications </span>
	    						</a>
	    					</li>
	    					<li class="nav-item ">
	    						<a class="nav-link" href="">
	    							<span class="sidebar-mini"> HA </span>
	    							<span class="sidebar-normal"> Hired Application </span>
	    						</a>
	    					</li>
	    				</ul>
	    			</div>
	    		</li>
	    		@endif
	    		@if(Auth::user()->role_id != 2)
	    		<li class="nav-item ">
	    			<a class="nav-link" data-toggle="collapse" href="#alumni">
	    				<i class="material-icons">perm_identity</i>
	    				<p> Alumni
	    					<b class="caret"></b>
	    				</p>
	    			</a>
	    			<div class="collapse" id="alumni">
	    				<ul class="nav">
	    					<li class="nav-item ">
	    						<a class="nav-link" href="">
	    							<span class="sidebar-mini"> AA </span>
	    							<span class="sidebar-normal"> All Alumnis </span>
	    						</a>
	    					</li>
	    				</ul>
	    			</div>
	    		</li>
	    		@endif
	    		<li class="nav-item ">
	    			<a class="nav-link" data-toggle="collapse" href="#reports">
	    				<i class="material-icons">description</i>
	    				<p> Report
	    					<b class="caret"></b>
	    				</p>
	    			</a>
	    			<div class="collapse" id="reports">
	    				<ul class="nav">
	    					<li class="nav-item ">
	    						<a class="nav-link" href="">
	    							<span class="sidebar-mini"> BY </span>
	    							<span class="sidebar-normal"> By Yearly </span>
	    						</a>
	    					</li>
	    					<li class="nav-item ">
	    						<a class="nav-link" href="">
	    							<span class="sidebar-mini"> BM </span>
	    							<span class="sidebar-normal"> By Monthly </span>
	    						</a>
	    					</li>
	    				</ul>
	    			</div>
	    		</li>
	    	</ul>
	    </div>
	</div>
	<div class="main-panel">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
			<div class="container-fluid">
				<div class="navbar-wrapper">
					<div class="navbar-minimize">
						<button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
							<i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
							<i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
						</button>
					</div>
					<a class="navbar-brand" href="#pablo">@yield('breadcrumb', 'Dashboard')</a>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
					<span class="sr-only">Toggle navigation</span>
					<span class="navbar-toggler-icon icon-bar"></span>
					<span class="navbar-toggler-icon icon-bar"></span>
					<span class="navbar-toggler-icon icon-bar"></span>
				</button>
				{{-- <div class="collapse navbar-collapse justify-content-end">
					<form class="navbar-form">
						<div class="input-group no-border">
							<input type="text" value="" class="form-control" placeholder="Search...">
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i>
								<div class="ripple-container"></div>
							</button>
						</div>
					</form>
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link" href="#pablo" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="material-icons">notifications</i>
								<span class="notification">5</span>
								<p>
									<span class="d-lg-none d-md-block">Some Actions
										<b class="caret"></b>
									</span>

								</p>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="#pablo">Mike John responded to your email</a>
								<a class="dropdown-item" href="#pablo">You have 5 new tasks</a>
								<a class="dropdown-item" href="#pablo">You're now friend with Andrew</a>
								<a class="dropdown-item" href="#pablo">Another Notification</a>
								<a class="dropdown-item" href="#pablo">Another One</a>
							</div>
						</li>
					</ul>
				</div> --}}
			</div>
		</nav>
		<!-- End Navbar -->


		<div class="content">
			<div class="container-fluid">
				@yield('content')
			</div>
			@include('widget.popup')
		</div>
		<footer class="footer ">
			<div class="container">
				{{-- <nav class="pull-left">
					<ul>
						<li>
							<a href="https://www.creative-tim.com">
								Creative Tim
							</a>
						</li>
						<li>
							<a href="http://presentation.creative-tim.com">
								About Us
							</a>
						</li>
						<li>
							<a href="http://blog.creative-tim.com">
								Blog
							</a>
						</li>
					</ul>
				</nav> --}}
				<div class="copyright pull-right">
					&copy;
					<script>
						document.write(new Date().getFullYear())
					</script> | JOB4U
					<p>Credit to 
					<a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for Material Design template.</p>
				</div>
			</div>
		</footer>
	</div>
</div>

	
<!--   Core JS Files   -->
<script src="{{asset('admin-template/js/core/jquery.min.js')}}"></script>
<script src="{{asset('admin-template/js/core/popper.min.js')}}"></script>
<script src="{{asset('admin-template/js/bootstrap-material-design.js')}}"></script>
<script src="{{asset('admin-template/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="{{asset('admin-template/js/plugins/moment.min.js')}}"></script>
<!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('admin-template/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('admin-template/js/plugins/nouislider.min.js')}}"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('admin-template/js/plugins/bootstrap-selectpicker.js')}}"></script>
<!--  Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="{{asset('admin-template/js/plugins/bootstrap-tagsinput.js')}}"></script>
<!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('admin-template/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!-- Plugins for presentation and navigation  -->
<script src="{{asset('admin-template/assets-for-demo/js/modernizr.js')}}"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{asset('admin-template/js/material-dashboard.js?v=2.0.1')}}"></script>
<!-- Dashboard scripts -->
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('admin-template/js/plugins/arrive.min.js" type="text/javascript')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('admin-template/js/plugins/jquery.validate.min.js')}}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{asset('admin-template/js/plugins/chartist.min.js')}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('admin-template/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{asset('admin-template/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('admin-template/js/plugins/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{asset('admin-template/js/plugins/nouislider.min.js')}}"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('admin-template/js/plugins/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('admin-template/js/plugins/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{asset('admin-template/js/plugins/sweetalert2.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('admin-template/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('admin-template/js/plugins/fullcalendar.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/fontawesome-all.js')}}"></script>

<script type="text/javascript" src="{{asset('summernote-0.8.9-dist/summernote-lite.js')}}"></script>

<script type="text/javascript" src="{{asset('admin-template/js/mp_custom.js')}}"></script>
</body>
</html>