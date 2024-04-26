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

    <link rel="stylesheet" href="<?php echo e(asset('css/public/agency.css')); ?>">

    <main class="body mb-20">
        <div class="flex flex-col items-center space-y-5">
            <div class="flex flex-col items-center justify-center space-y-5 ">
                <h2>Agència</h2>
                <div class="w-full">
                    <p class="text-justify">Sed sollicitudin libero eu lacus sodales ultricies molestie ut justo.  Nunc aliquet maximus est, sed sodales lacus accumsan in. Curabitur ut  risus sem. Fusce sit amet est mauris. Donec malesuada velit nec  venenatis rhoncus. Phasellus interdum, quam eget blandit interdum, velit  risus vulputate mauris, quis iaculis neque nisi sed turpis. In eget  nisi a nibh efficitur hendrerit a vitae ligula. Ut a nibh placerat,  iaculis urna a, imperdiet massa. Integer non mauris rhoncus, mattis.</p>
                </div>
                <div class="w-full flex flex-wrap space-x-24" id="collaborators">
                    <?php $__currentLoopData = $collaborators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $collaborator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="collaborator flex flex-col items-center ">
                            <div class="cover mb-2">
                                <a href="<?php echo e(route("collaborator-detail.{$locale}", $collaborator['id'])); ?>">
                                    <img src="<?php echo e(asset('img/collab/thumbnails/' . $collaborator['image'])); ?>"
                                        alt="<?php echo e($collaborator['first_name']); ?> <?php echo e($collaborator['last_name']); ?>"
                                        style="height: 19.7em">
                                </a>
                            </div>
                            <div id="author-info-<?php echo e($collaborator['slug']); ?>"
                                class="flex flex-col items-center space-y-2">
                                <div class="book-title w-fit h-12 flex justify-center items-center text-center">
                                    <?php echo e($collaborator['first_name']); ?> <?php echo e($collaborator['last_name']); ?></div>
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
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/public/agency.blade.php ENDPATH**/ ?>