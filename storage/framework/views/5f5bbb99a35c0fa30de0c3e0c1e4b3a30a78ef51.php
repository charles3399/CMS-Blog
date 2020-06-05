

<?php $__env->startSection('content'); ?>

    <div class="card shadow card-default">

        <div class="card-header">
            <h4><?php echo e(isset($category) ? 'Edit Category' : 'Create Category'); ?></h4>
        </div>

        <div class="card-body">

            <?php echo $__env->make('partial.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <form action="<?php echo e(isset($category) ? route('categories.update', $category->id) : route('categories.store')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <?php if(isset($category)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo e(isset($category) ? $category->name : ''); ?> <?php echo e(old('name')); ?>">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(isset($category) ? 'Update category' : 'Add category'); ?>

                    </button>
                </div>

            </form>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\cms\resources\views/categories/create.blade.php ENDPATH**/ ?>