<?php
    $page = 'customers';
?>



<?php $__env->startSection('content'); ?>
    <div id=page-wrapper>
        <div class=content>
            <div class=content-header>
                <div class=header-icon>
                    <i class=pe-7s-users></i>
                </div>
                <div class=header-title>
                    <h1>Emails</h1>
                    <small>Admin Control Panel</small>
                    <ol class=breadcrumb>
                        <li><a href=<?php echo e(url('/home')); ?>><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Emails</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo e(route('new_customer')); ?>" id="">
                        <?php echo e(csrf_field()); ?>

                        <!--Social Buttons-->
                            <div class="">
                                <strong>Enter Details Below</strong><hr>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Client Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="email" type="text" class="form-control <?php echo e($errors->has('email') ? ' has-error' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Enter customer First Name Here">
                                </div>
                                <?php if($errors->has('email')): ?>
                                    <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Subject</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="subject" type="text" class="form-control <?php echo e($errors->has('subject') ? ' has-error' : ''); ?>" name="subject" value="<?php echo e(old('subject')); ?>" required autocomplete="subject" autofocus placeholder="Enter Email Subject Here">
                                </div>
                                <?php if($errors->has('subject')): ?>
                                    <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong><?php echo e($errors->first('subject')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div align="center">
                                <button type="submit" class="btn btn-success btn-lg" name="admin" id="submit"><i class="fa fa-paper-plane-o"></i> Send E-mail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php if(Auth::User()->is_admin == 1): ?>
                <td align="center">
                    <div class=row>
                        <div class="panel panel-bd">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                        <br>
                                        <thead>
                                        <tr>
                                            <th style="background-color:#1b7943; color:white;">S/N</th>
                                            <th>Email</th>
                                            <th>Sent By</th>
                                            <th>Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr">
                                                <td style="background-color:#1b7943; color:white;"></td>
                                                <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Email: </b><?php echo e($product->email); ?></td>
                                                <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Sent By: </b><?php echo e($product->user->first_name); ?> <?php echo e($product->user->last_name); ?></td>
                                                <td><b class="d-sm-block d-xs-block d-md-none d-lg-none">Time: </b><?php echo e($product->created_at); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>