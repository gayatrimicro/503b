@extends('layouts.loginapp')

@section('content')
<section id="wrapper">
    <div class="login-register" style="background-image:url({{ asset('adminassets/assets/images/main.jpg') }});">
        <div class="login-box card" style="background-color: #ffffffc2 !important;">
            <div class="card-body" style="box-shadow: 0px 0px 15px 8px #fcfcfc;">
                <form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="{{ url('admin/register') }}">
                    {{ csrf_field() }}
                    <h3 class="box-title m-b-20">Sign Up</h3>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input type="text" class="form-control"  placeholder="Name" name="name" value="{{ old('name') }}" autofocus required="">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control"  placeholder="Email" name="email" value="{{ old('email') }}" required="">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password"> </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="password-confirm" name="password_confirmation" type="password" required="" placeholder="Confirm Password"> </div>
                            @if ($errors->has('cpassword'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cpassword') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sing Up</button>
                        </div>
                    </div>
                </form>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <div>Already have an account? <a href="{{ url('admin/login') }}" class="text-info m-l-5"><b>Sign In</b></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
