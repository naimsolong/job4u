<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin-template/css/material-dashboard.css')}}">

</head>
<body style="background-image: url('{{asset('admin-template/img/card-3.jpg')}}');background-position: center;background-repeat: no-repeat;background-size: cover;">

<div class="wrapper">
    <div class="container-fluid">
        
        <div class="row justify-content-center" style="height: 100vh;">
            <div class="col-lg-5 align-self-center">
                <div class="container">
                    <div class="card">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card-header text-center">
                                <h4 class="card-title">Administrator</h4>
                            </div>

                            <div class="card-body">

                                    <div class="form-group">
                                        <label for="username" class="bmd-label-floating">Username</label>

                                            <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group ">
                                        <label for="password" class="bmd-label-floating">Password</label>

                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>

                            <div class="card-footer ">
                                <button type="submit" class="btn btn-fill btn-rose">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

    
</body>
</html>