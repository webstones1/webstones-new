

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
                    <a href="<?php echo e(url('addTechnologyWeWork')); ?>"><button type="button" class="btn btn-info">Add New</button></a>
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
<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>


<table class="table table-bordered">
    <?php if($technologyWeWorks->isEmpty()): ?>
            <tr>
                <td class="text-center font-weight-bold">No records found.</td>
            </tr> 
    <?php else: ?>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>                
                <th>Image</th>
                <th colspan="3" style="text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody>
        
            <?php $__currentLoopData = $technologyWeWorks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technologyWeWork): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($technologyWeWork->title); ?></td>
                    <td><?php echo e($technologyWeWork->description); ?></td>                                   
                    <td>
                        <img src="<?php echo e(asset('storage/' . $technologyWeWork->image)); ?>" alt="ExcellenceAndExpertise Image" style="width:100px;height:auto;">
                    </td>
                    <td>
                        <a href="editTechnologyWeWork/<?php echo e($technologyWeWork->id); ?>">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                    </td>                    
                    <!-- <td><button type="button" class="btn btn-warning">Disable</button></td> -->
                    <td>
                        <a href="#" class="btn <?php echo e($technologyWeWork->is_enabled === 'y' ? 'btn-warning' : 'btn-success'); ?> enable-disable-button-technology-we-work" data-technologywework-id="<?php echo e($technologyWeWork->id); ?>">
                            <?php echo e($technologyWeWork->is_enabled === 'y' ? 'Disable' : 'Enable'); ?>

                        </a>
                    </td>
                    <td><a href="deleteTechnologyWeWork/<?php echo e($technologyWeWork->id); ?>" onclick="return confirm('Are you sure you want to delete this record?');"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
        </tbody>
    <?php endif; ?>
    </table>
    <?php echo e($technologyWeWorks->links()); ?>


</div>
<!-- /.container-fluid -->  
</section>
<!-- /.content -->      
<?php $__env->stopSection(); ?> 
      
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webstonesSite\resources\views/backend/TechnologhWeWork/manageTechnologyWeWork.blade.php ENDPATH**/ ?>