<?php
    $page="dashboard";
?>


<?php $__env->startSection('content'); ?>
    <div id=page-wrapper>
        <div class=content>
            <div class=content-header>
                <div class=header-icon>
                    <i class=pe-7s-monitor></i>
                </div>
                <div class=header-title>
                    <h1>Dashboard</h1>
                    <small>Site Admin</small>
                    <ol class=breadcrumb>
                        <li><a href=<?php echo e(url('/home')); ?>><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="statistic-box statistic-filled-3">
                        <h2><span class=count-number><?php echo e($count_admins); ?></h2>
                        <div class=small>Users </div>
                        <i class="pe-7s-users statistic_icon"></i>
                    </div>
                </div>
                <a href="<?php echo e(url('/admin/customers')); ?>">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="statistic-box statistic-filled-3">
                            <h2><span class=count-number><?php echo e($count_products); ?></h2>
                            <div class=small>Emails Sent</div>
                            <i class="pe-7s-user statistic_icon"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>