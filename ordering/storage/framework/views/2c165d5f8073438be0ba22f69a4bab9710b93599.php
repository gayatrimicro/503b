<?php $__env->startSection('content'); ?>
<section id="wrapper">
    <div class="login-register" style="background-image:url(<?php echo e(asset('adminassets/assets/images/main.jpg')); ?>);">
        <div class="login-box card" style="background-color: #ffffffc2 !important;">
            <div class="card-body" style="box-shadow: 0px 0px 15px 8px #fcfcfc;">
                <form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="<?php echo e(url('admin/register')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <h3 class="box-title m-b-20">Sign Up</h3>
                    <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <div class="col-xs-12">
                            <input type="text" class="form-control"  placeholder="Name" name="name" value="<?php echo e(old('name')); ?>" autofocus required="">
                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control"  placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required="">
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password"> </div>
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="password-confirm" name="password_confirmation" type="password" required="" placeholder="Confirm Password"> </div>
                            <?php if($errors->has('cpassword')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('cpassword')); ?></strong>
                                </span>
                            <?php endif; ?>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sing Up</button>
                        </div>
                    </div>
                </form>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <div>Already have an account? <a href="<?php echo e(url('admin/login')); ?>" class="text-info m-l-5"><b>Sign In</b></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.loginapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/503bfacility.com/httpdocs/ordering/resources/views/auth/register.blade.php ENDPATH**/ ?>