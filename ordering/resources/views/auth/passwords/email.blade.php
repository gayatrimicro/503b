
@extends('layouts.loginapp')

@section('content')
<section id="wrapper">
    <div class="login-register" style="background-image:url({{ asset('adminassets/assets/images/big/login-register1.jpg') }});">
        <div class="login-box card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <h3 class="box-title m-b-20">{{ __('Reset Password') }}</h3>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control"  placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" autofocus required="">
                             @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-md btn-block text-uppercase waves-effect waves-light" type="submit">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
