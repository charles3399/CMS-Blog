

<?php $__env->startSection('content'); ?>

    <div class="card shadow card-default">
        <div class="card-header">

          <h4><?php echo e(isset($post)? 'Edit post' : 'Create post'); ?></h4>
        
        </div>
        
        <div class="card-body">

          <?php echo $__env->make('partial.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <form action="<?php echo e(isset($post) ? route('posts.update', $post->id) : route('posts.store')); ?>" method="post" enctype="multipart/form-data">

                <?php echo csrf_field(); ?>

                <?php if(isset($post)): ?>
                  <?php echo method_field('PATCH'); ?>
                <?php endif; ?>
    
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" id="title" class="form-control" value="<?php echo e(isset($post)? $post->title : ''); ?> <?php echo e(old('title')); ?>">
                </div>
    
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control"><?php echo e(isset($post)? $post->description : ''); ?> <?php echo e(old('description')); ?>

                    </textarea>
                  </div>
    
                  <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="<?php echo e(isset($post)? $post->content : ''); ?> <?php echo e(old('content')); ?>">
                    <trix-editor input="content"></trix-editor>
                  </div>
    
                  <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" name="published_at" id="published_at" class="form-control" value="<?php echo e(isset($post)? $post->published_at : ''); ?> <?php echo e(old('published_at')); ?>">
                  </div>

                  <?php if(isset($post)): ?>
                      <div class="form form-group">
                      <img src="<?php echo e(asset('storage/'.$post->image)); ?>" alt="" style="width: 50%">
                      </div>
                  <?php else: ?>
                      
                  <?php endif; ?>
    
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"
                          
                          <?php if(isset($post)): ?>
                            <?php if($category->id == $post->category_id): ?>
                              selected
                            <?php endif; ?>
                          <?php endif; ?>>

                          <?php echo e($category->name); ?>

                        </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>

                  <?php if($tags->count() > 0): ?>
                  <div class="form-group">
                    <label for="tags">Tags</label>
                    <select class="tagSelect form-control" name="tags[]" id="tags" multiple="multiple">
                      <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tag->id); ?> <?php echo e(old('tags[]')); ?>"
                          
                          <?php if(isset($post)): ?>
                            <?php if($post->hasTag($tag->id)): ?>
                              selected
                            <?php endif; ?>
                          <?php endif; ?>
                          
                          >
                          <?php echo e($tag->name); ?>

                        </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <?php endif; ?>
    
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                      <?php echo e(isset($post)? 'Update post' : 'Create post'); ?>

                    </button>
                </div>
    
            </form>
        </div>

    </div>

    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> <!--trixeditor, datepicker, and select2 plugin-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
      flatpickr('#published_at', {

        enableTime: true,
        enableSeconds: true

      })
    </script>

    <script>
      $(document).ready(function()
      {
        $('.tagSelect').select2();
      })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?> <!--trixeditor, datepicker, and select2 plugin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\cms\resources\views/posts/create.blade.php ENDPATH**/ ?>