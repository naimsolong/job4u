<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title', 'JOB4U Employer')</title>

	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-4.0.0/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/mp_custom.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('summernote-0.8.9-dist/summernote-lite.css')}}">

</head>
<body id="bodytop">
	@auth
		@include('widget.nav')
	@else
    	@include('widget.nav_employer')
    @endauth

	<div class="container p-5">
		@yield('content')
	</div>

	@include('widget.popup')

	@include('widget.footer_employer')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script type="text/javascript" src="{{asset('bootstrap-4.0.0/js/bootstrap.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/fontawesome-all.js')}}"></script>
	
	<script type="text/javascript" src="{{asset('summernote-0.8.9-dist/summernote-lite.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/mp_custom.js')}}"></script>
	
</body>
</html>