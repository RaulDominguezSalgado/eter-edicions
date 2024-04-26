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

    <link rel="stylesheet" href="<?php echo e(asset('css/public/collaborator.css')); ?>">

    <main class="body space-y-24 mb-12">
        <div class="collaborator flex justify-between space-x-10 px-10 mb-4">
            <div class="mr-6 cover">
                
                
                <img class="" src="<?php echo e(asset('img/collab/covers/' . $collaborator['image'])); ?>" alt="<?php echo e($collaborator['first_name'] . " " . $collaborator['last_name']); ?>">
                
            </div>
            <div class="details space-y-9">
                <div class="flex flex-row justify-between items-center">
                    <h2><?php echo e($collaborator['first_name'] . " " . $collaborator['last_name']); ?></h2>
                </div>
                <div id="description" class="text-justify">
                    <p><?php echo e($collaborator['biography']); ?></p>
                </div>
            </div>
        </div>

        <?php if(count($collaborator['books'])>0): ?>
        <div id="books" class="flex flex-col items-center space-y-4">
            <h2>Obres disponibles</h2>

            <div class="flex">
                <?php $__currentLoopData = $collaborator['books']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="book flex flex-col items-center mb-6 w-64 px-6">
                    <div class="cover mb-4 flex justify-center">
                        <a href="<?php echo e(route("book-detail.{$locale}", $book['id'])); ?>">
                            <img src="<?php echo e(asset('img/books/thumbnails/' . $book['image'])); ?>"
                                alt="<?php echo e($book['title']); ?>" style="height: 13.75em" class="aspect-[2/3]">
                        </a>
                    </div>
                    <div id="book-info-<?php echo e($book['slug']); ?>" class="flex flex-col items-center space-y-2 w-full">
                        <div class="book-title flex justify-center items-center text-center">
                            <?php echo e($book['title']); ?>

                        </div>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
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

<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/public/collaborator.blade.php ENDPATH**/ ?>