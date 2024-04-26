<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('title', null, []); ?> 
        <?php echo e($page['title']); ?> | <?php echo e($page['shortDescription']); ?> | <?php echo e($page['web']); ?>

     <?php $__env->endSlot(); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/public/posts.css')); ?>">

    <main class="">
        <div class="flex flex-col items-center space-y-10">
            <div class="flex flex-col items-center space-y-6">
                <h2>Activitats</h2>
            </div>

            <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16" id="catalog">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="post space-y-2">
                        <div class="">
                            <h5 class="font-bold"><?php echo e($post['title']); ?></h5>
                        </div>
                        <div class="cover space-y-4">
                            <a href="<?php echo e(route("post-detail.{$locale}", $post['id'])); ?>">
                                <img src="<?php echo e(asset('img/posts/thumbnails/' . $post['image'])); ?>"
                                    alt="<?php echo e($post['title']); ?>">
                            </a>
                        </div>
                        <div class="headline">
                            <div class="">
                                <p class="uppercase"><?php echo e($post['post_type']); ?></p>
                            </div>
                            <div class="date-info h-auto">
                                <div class="w-fit">
                                    <p class="p12"><?php echo e($post['date']); ?></p>
                                </div>
                                <div>
                                    <p class="p12"><?php echo e($post['location']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="description">
                            <p class="p14"><?php echo e($post['description']); ?></p>
                        </div>
                        <div class="w-fit">
                            <a href="<?php echo e(route('post-detail.ca', $post['id'])); ?>">
                                <p class="p14 underline">Saber-ne més</p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </main>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/public/activities.blade.php ENDPATH**/ ?>