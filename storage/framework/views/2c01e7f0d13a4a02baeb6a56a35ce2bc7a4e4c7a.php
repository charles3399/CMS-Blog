

<?php $__env->startSection('content'); ?>

    <div class="card card-default">
        <div class="card-header">
            <h3 class="float-left">Users</h3>
        </div>

        <div class="card-body">
            <?php if($users->count() > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img width="40px" height="40px" style="border-radius: 50%" src="<?php echo e(Gravatar::src($user->email)); ?>" alt=""></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <?php if(!$user->isAdmin()): ?>
                                        <form action="<?php echo e(route('users.make-admin', $user->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                        </form>
                                    <?php else: ?>    
                                        <strong>Admin</strong>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
            <?php else: ?>
                No users yet...
            <?php endif; ?>


        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\cms\resources\views/users/index.blade.php ENDPATH**/ ?>