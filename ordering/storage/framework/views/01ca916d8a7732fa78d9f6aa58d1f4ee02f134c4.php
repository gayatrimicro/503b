<?php $__env->startSection('content'); ?>
<section id="wrapper">
    <div class="login-register" style="background-image:url(<?php echo e(asset('adminassets/assets/images/big/login-register1.jpg')); ?>);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="<?php echo e(route('password.update')); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="token" value="<?php echo e($token); ?>">

                    <h3 class="box-title m-b-20"><?php echo e(__('Reset Password')); ?></h3>
                    <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control"  placeholder="<?php echo e(__('E-Mail Address')); ?>" name="email" value="<?php echo e(old('email')); ?>" autofocus required="">
                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                <span class="help-block">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <div class="col-xs-12">
                            <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password"> </div>
                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="password-confirm" name="password_confirmation" type="password" required="" placeholder="<?php echo e(__('Confirm Password')); ?>"> </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.loginapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\503b-admin\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>