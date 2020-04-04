<?php $__env->startSection('content'); ?>
<section id="wrapper">
    <div class="login-register" style="background-image:url(<?php echo e(asset('adminassets/assets/images/big/login-register1.jpg')); ?>);">
        <div class="login-box card">
            <div class="card-body">
                <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="<?php echo e(route('password.email')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <h3 class="box-title m-b-20"><?php echo e(__('Reset Password')); ?></h3>
                    <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control"  placeholder="<?php echo e(__('E-Mail Address')); ?>" name="email" value="<?php echo e(old('email')); ?>" autofocus required="">
                             <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-md btn-block text-uppercase waves-effect waves-light" type="submit"><?php echo e(__('Send Password Reset Link')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.loginapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/503bfacility.com/httpdocs/ordering/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>