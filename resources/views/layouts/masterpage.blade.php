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

	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-4.0.0/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/mp_custom.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('summernote-0.8.9-dist/summernote-lite.css')}}">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

</head>
<body id="bodytop">
	
	@auth
		@include('widget.nav')
	@else
		@include('widget.nav_alumni')
	@endauth

	<div class="container pt-3 pb-5">			
		@yield('content')
	</div>

	@include('widget.popup')

	@include('widget.footer_alumni')


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
	{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> --}}

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

	<script type="text/javascript" src="{{asset('bootstrap-4.0.0/js/bootstrap.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/fontawesome-all.js')}}"></script>

	<script type="text/javascript" src="{{asset('summernote-0.8.9-dist/summernote-lite.js')}}"></script>
	
	<script type="text/javascript" src="{{asset('js/mp_custom.js')}}"></script>
	
</body>
</html>