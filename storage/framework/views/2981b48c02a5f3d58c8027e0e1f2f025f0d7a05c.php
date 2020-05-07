

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">My Profile</div>

    <div class="card-body">

        <?php echo $__env->make('partial.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <form action="<?php echo e(route('users.update-profile')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo e($user->name); ?>">
            </div>

            <div class="form-group">
                <label for="about">About Me</label>
                <textarea class="form-control" name="about" id="about" rows="5" cols="5"><?php echo e($user->about); ?></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>


        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\cms\resources\views/users/edit.blade.php ENDPATH**/ ?>