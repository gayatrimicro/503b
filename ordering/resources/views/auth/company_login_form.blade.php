@extends('layouts.loginapp')

@section('content')
<section id="wrapper">
	<div class="login-register" style="background-image:url({{ asset('adminassets/assets/images/big/login-register1.jpg') }});">
		<div class="login-box card">
			<div class="card-body">
				@if(Session::has('company_login_error'))
				<div class="alert alert-danger"> <i class="fa fa-times-circle"></i> {{ Session::get('company_login_error') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
				@endif
				<form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="{{ url('/company-login') }}">
					{{ csrf_field() }}
					<h3 class="box-title m-b-20">Company Sign In</h3>
					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="col-xs-12">
							<input id="email" type="email" class="form-control"  placeholder="Email" name="email" value="{{ old('email') }}" autofocus required="">
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" id="password" name="password" type="password" required="" placeholder="Password">
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12 font-14">
							<div class="checkbox checkbox-primary pull-left p-t-0">
							</div>
						</div>
					</div>
					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
						</div>

						<a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
