@extends('layouts.masterpage_alumni')

@section('title')
Log In
@endsection

@section('content')
<div class="row my-4 justify-content-center">
    <div class="col-12 text-center">
        <h4>JOB4U For Alumni</h4>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><i class="fas fa-sign-in-alt"></i> Login</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="username" class="col-lg-4 col-form-label text-lg-right">Username</label>

                        <div class="col-lg-6">
                            <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-lg-4 col-form-label text-lg-right">Password</label>

                        <div class="col-lg-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-lg-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-lg-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-lg-4">
                            Don't have an account yet?
                            <a class="btn btn-link" href="{{ route('register') }}">
                                Register Now
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
