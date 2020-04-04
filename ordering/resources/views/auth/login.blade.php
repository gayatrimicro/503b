@extends('layouts.loginapp')

@section('content')
<section id="wrapper">
    <div class="login-register" style="background-image:url({{ asset('adminassets/assets/images/big/login-register1.jpg') }});">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="username" type="text" class="form-control"  placeholder="Username" name="username" value="{{ old('username') }}" autofocus required="">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
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
                    <div class="form-group row">
                        <div class="col-md-12 font-14">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                            </div>
                            <!--<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right">       Forgot pwd?</a>-->
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
