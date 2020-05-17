

<?php $__env->startSection('content'); ?>

    <div class="card shadow card-default">
        <div class="card-header">
            <h3 class="float-left">Tags</h3>
            <a href="<?php echo e(route('tags.create')); ?>" class="btn btn-success float-right">New Tag</a>
        </div>

        <div class="card-body">
            <?php if($tags->count() > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Posts</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($tag->name); ?></td>
                                <td>
                                    <?php echo e($tag->posts->count()); ?>

                                </td>
                                <td>

                                    <div class="btn btn-danger btn-sm float-right" onclick="handleDelete(<?php echo e($tag->id); ?>)">Delete</div>

                                    <a href="<?php echo e(route('tags.edit', $tag->id)); ?>" class="btn btn-primary btn-sm  float-right mr-2">Edit</a>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="post" id="deleteTagForm">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>WARNING
                                        </b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-bold">
                                        Are you sure you want to delete this tag?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                                    <button type="submit" class="btn btn-danger">Yes, delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                There are no tags yet...
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deleteTagForm')

            form.action = 'tags/' + id

            $('#deleteModal').modal('show')
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\cms\resources\views/tags/index.blade.php ENDPATH**/ ?>