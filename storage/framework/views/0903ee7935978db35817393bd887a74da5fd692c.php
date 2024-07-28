<?php
    $page = 'auth';
?>

<?php $__env->startSection('title', 'Bookyourvacay | Login'); ?>

<?php $__env->startSection('content'); ?>
    <section class="content" id="contain">
        <div class="row">
            <div class="container" style="margin-top: 100px;margin-bottom: -300px;">
                <div class="d-flex justify-content-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa fa-user-circle"></i> Login</h3><br>
                            <div class="d-flex justify-content-left links">
                                Don't have an account?<a href="<?php echo e(url('register')); ?>">Register</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <?php if($errors->has('email')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <span class="help-block">
                                            <i class="fa fa-warning"></i> <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <?php if($errors->has('password')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <span class="help-block">
                                            <i class="fa fa-warning"></i> <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <div class="input-group form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input  id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Email Address">
                                </div>
                                <div class="input-group form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                </div>
                                <div class="row align-items-center remember">
                                    <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>Remember Me
                                </div><br>
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-block login_btn">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center links" style="margin-top:-35px;">
                                <a href="<?php echo e(route('password.request')); ?>">Forgot your password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>