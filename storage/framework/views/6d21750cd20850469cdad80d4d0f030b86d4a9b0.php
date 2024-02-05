

<?php $__env->startSection('content'); ?> 
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">        
        <div style="float:left;">
          <h1 class="m-0"><?php echo e($pageTitle); ?></h1>
          </div>
          <div style="float:left;padding-left:20px;">
          <a href="<?php echo e(url('manageExcellenceAndExpertise')); ?>"><button type="button" class="btn btn-info">Manage</button></a>
        </div>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"><?php echo e($pageTitle); ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <form id="addTechnologyWeWorkForm" action="submitTechnologyWeWork" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="uname">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo e(old('title')); ?>" >  
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>     
                        </div>
                      </div>                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="uname">Description:</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="4" cols="50"><?php echo e(old('description')); ?></textarea>                  
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>     
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control" id="image"  name="image" >     
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>  
                        </div>
                      </div>
                    </div> 
                </div>  
            </div>  
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- /.container-fluid -->      
      </section>
<!-- /.content -->
<?php $__env->stopSection(); ?> 
      
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webstonesSite\resources\views/backend/TechnologhWeWork/addTechnologyWeWork.blade.php ENDPATH**/ ?>