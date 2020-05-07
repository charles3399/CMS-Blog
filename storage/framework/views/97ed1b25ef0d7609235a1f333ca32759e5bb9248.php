

<?php $__env->startSection('content'); ?>

    <div class="card card-default">
        <div class="card-header">

            <h3 class="float-left">Posts</h3>

            <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-success float-right">New Post</a> 
        </div>

        <div class="card-body">
            <?php if($posts->count() > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Published</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(asset('storage/'.$post->image)); ?>" class="img-thumbnail" width="120px" height="100px"></td>
                                <td><?php echo e($post->title); ?></td>
                                <td><?php echo e($post->category->name); ?></td>
                                <td><?php echo e($post->published_at); ?></td>

                                <td>
                                        <?php if($post->trashed()): ?>

                                        <form action="<?php echo e(route('restore-posts', $post->id)); ?>" method="POST">

                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>

                                            <button type="submit" class="btn btn-primary btn-sm float-right">Restore</button>

                                        </form>
                                            
                                        <?php else: ?>
                                            <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-primary btn-sm float-right">Edit</a>
                                        <?php endif; ?>    
                                </td>

                                <td>

                                    <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="btn btn-danger btn-sm float-right mb-1">
                                            
                                            <?php echo e($post->trashed()? 'Delete' : 'Trash'); ?>


                                        </button>
                                    </form>
                                </td>

                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
            <?php else: ?>
                Empty...
            <?php endif; ?>


        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\cms\resources\views/posts/index.blade.php ENDPATH**/ ?>