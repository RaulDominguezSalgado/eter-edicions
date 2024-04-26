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

    <link rel="stylesheet" href="<?php echo e(asset('css/public/collaborators.css')); ?>">

    <main class="body mb-20">
        <div class="flex flex-col items-center space-y-40">
            
            <div class="flex flex-col items-center justify-center space-y-5">
                <h2>Autors</h2>
                <div class="w-full grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 px-16" id="catalog">
                    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="collaborator flex flex-col items-center mb-6">
                            <div class="cover mb-2">
                                <a href="<?php echo e(route("collaborator-detail.{$locale}", $author['id'])); ?>">
                                    <img src="<?php echo e(asset('img/collab/thumbnails/' . $author['image'])); ?>"
                                        alt="<?php echo e($author['first_name']); ?> <?php echo e($author['last_name']); ?>"
                                        style="height: 19.7em">
                                </a>
                            </div>
                            <div id="author-info-<?php echo e($author['slug']); ?>"
                                class="flex flex-col items-center space-y-2 w-64">
                                <div class="book-title w-fit h-12 flex justify-center items-center text-center">
                                    <?php echo e($author['first_name']); ?> <?php echo e($author['last_name']); ?></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center space-y-5">
                <h2>Traductors</h2>
                <div class="w-full grid grid-cols-4 px-16" id="catalog">
                    <?php $__currentLoopData = $translators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $translator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="collaborator flex flex-col items-center mb-6">
                            <div class="cover mb-2">
                                <a href="<?php echo e(route("collaborator-detail.{$locale}", $translator['id'])); ?>">
                                    <img src="<?php echo e(asset('img/collab/thumbnails/' . $translator['image'])); ?>"
                                        alt="<?php echo e($translator['first_name']); ?> <?php echo e($translator['last_name']); ?>"
                                        style="height: 19.7em">
                                </a>
                            </div>
                            <div id="author-info-<?php echo e($translator['slug']); ?>"
                                class="flex flex-col items-center space-y-2 w-64">
                                <div class="book-title w-fit h-12 flex justify-center items-center text-center">
                                    <?php echo e($translator['first_name']); ?> <?php echo e($translator['last_name']); ?></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
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
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/public/collaborators.blade.php ENDPATH**/ ?>