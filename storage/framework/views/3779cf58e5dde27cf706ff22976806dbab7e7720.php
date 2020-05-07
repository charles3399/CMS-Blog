<?php $__env->startSection('title'); ?>
    CMS Blog
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
      .card-img-top{ 

        height: 350px;
        object-fit: cover;
        /*object-position: 50% 50%;*/
      }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
  <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
    <div class="container">

      <div class="row">
        <div class="col-md-8 mx-auto">

          <h1>Welcome to my blog</h1>
          <p class="lead-2 opacity-90 mt-6">Please see some of the contents below and enjoy!</p>

        </div>
      </div>

    </div>
  </header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <main class="main-content">
    <div class="section bg-gray">
      <div class="container">
        <div class="row">


          <div class="col-md-8 col-xl-9">
            <div class="row gap-y">

              <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <div class="col-md-6">
                      <div class="card border hover-shadow-6 mb-6 d-block">
                      <a href="<?php echo e(route('blog.show', $post->id)); ?>"><img class="card-img-top" src="<?php echo e(asset('storage/'.$post->image)); ?>" alt="Card image cap"></a>
                      <div class="p-6 text-center">

                          <p>
                              <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">
                                  <?php echo e($post->category->name); ?>

                              </a>
                          </p>

                          <h5 class="mb-0">
                              <a class="text-dark" href="<?php echo e(route('blog.show', $post->id)); ?>">
                                  <?php echo e($post->title); ?>

                              </a>
                          </h5>

                      </div>
                      </div>
                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center">No results found <strong><?php echo e(request()->query('search')); ?></strong></p>
              <?php endif; ?>
              

            </div> 

            <?php echo e($posts->appends(['search' => request()->query('search') ])->links()); ?>


          </div>

          <?php echo $__env->make('partial.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
      </div>
    </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\cms\resources\views/welcome.blade.php ENDPATH**/ ?>