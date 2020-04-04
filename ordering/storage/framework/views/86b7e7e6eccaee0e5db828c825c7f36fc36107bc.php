<?php $__env->startSection('content'); ?>
<section id="wrapper">
	<div class="login-register" style="background-image:url(<?php echo e(asset('adminassets/assets/images/big/login-register1.jpg')); ?>);">
		<div class="login-box card">
			<div class="card-body">
				<?php if(Session::has('company_login_error')): ?>
				<div class="alert alert-danger"> <i class="fa fa-times-circle"></i> <?php echo e(Session::get('company_login_error')); ?>

					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
				<?php endif; ?>
				<form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="<?php echo e(url('/company-login')); ?>">
					<?php echo e(csrf_field()); ?>

					<h3 class="box-title m-b-20">Company Sign In</h3>
					<div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
						<div class="col-xs-12">
							<input id="email" type="email" class="form-control"  placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" autofocus required="">
							<?php if($errors->has('email')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('email')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" id="password" name="password" type="password" required="" placeholder="Password">
							<?php if($errors->has('password')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('password')); ?></strong>
								</span>
							<?php endif; ?>
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

						<a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Forgot Your Password?')); ?>

                        </a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.loginapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coffeeoverchat.com/503-admin.coffeeoverchat.com/ordering/resources/views/auth/company_login_form.blade.php ENDPATH**/ ?>