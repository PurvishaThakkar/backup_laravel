<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        <?php echo e(csrf_field()); ?>




                            
                        <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="company_id" class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">

                            <select class="form-control" name="company_id">

                                <?php foreach($companies as $company){ ?>
                                
                                    <option value="<?php echo e($company->c_id); ?>"  <?php echo e($company->c_id == $department->company_id?"selected='selected'":""); ?>><?php echo e($company->c_name); ?></option>
                              
                                <?php } ?>

                            </select>
                            
                            <?php if($errors->has('company_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                            </div>
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="d_name" value="<?php echo e(old('d_name',$department->e_name)); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                     

                        <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="status" class="col-md-4 control-label">status</label>

                            <div class="col-md-6">
                                <select class="form-control" name="status" value="<?php echo e(old('status',$department->status)); ?>" required>
                                <option value="pending">pending</option>
                                <option  value="aproved">aproved</option>
                                <option  value="running">running</option>
                                </select>

                                <?php if($errors->has('status')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="align:center">
                                    submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>