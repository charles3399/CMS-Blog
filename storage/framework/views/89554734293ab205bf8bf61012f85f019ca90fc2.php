

<?php $__env->startSection('content'); ?>

    <div class="card card-default">

        <div class="card-header">
            <?php echo e(isset($tag) ? 'Edit Tag' : 'Create Tag'); ?>

        </div>

        <div class="card-body">
            
            <?php echo $__env->make('partial.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <form action="<?php echo e(isset($tag) ? route('tags.update', $tag->id) : route('tags.store')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <?php if(isset($tag)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo e(isset($tag) ? $tag->name : ''); ?>">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(isset($tag) ? 'Update tag' : 'Add tag'); ?>

                    </button>
                </div>

            </form>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\cms\resources\views/tags/create.blade.php ENDPATH**/ ?>