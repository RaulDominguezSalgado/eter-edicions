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
    <link rel="stylesheet" href="<?php echo e(asset('css/public/catalog.css')); ?>">

    <main class="mb-24 space-y-16">

        <div class="flex flex-col items-center space-y-16">
            <div class="flex flex-col items-center space-y-6">
                <h2>Catàleg</h2>
            </div>

            <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16" id="catalog">
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="book flex flex-col items-center mb-6">
                        <div class="cover mb-4">
                            <a href="<?php echo e(route("book-detail.{$locale}", $book['id'])); ?>">
                                <img src="<?php echo e(asset('img/books/thumbnails/' . $book['image'])); ?>"
                                    alt="<?php echo e($book['title']); ?>" style="height: 19.7em">
                            </a>
                        </div>
                        <div id="book-info-<?php echo e($book['slug']); ?>" class="flex flex-col items-center space-y-2 w-64">
                            <div class="book-title w-fit h-12 flex justify-center items-center text-center">
                                <?php echo e($book['title']); ?></div>
                            <div class="flex space-x-1">
                                <?php $__currentLoopData = $book['authors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php if(!$loop->last): ?>
                                        <div class="book-author"><?php echo e($author); ?>,</div>
                                        
                                    <?php else: ?>
                                        <div class="book-author"><?php echo e($author); ?></div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="book-translator flex space-x-1 text-center">
                                <div class="book-translator">Traducció de
                                    <?php $__currentLoopData = $book['translators']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $translator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!$loop->last): ?>
                                            <?php echo e($translator); ?>,
                                            
                                        <?php else: ?>
                                            <?php echo e($translator); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>

        <div class="flex flex-col items-center space-y-6" id="news">
            <div>
                <h2>Notícies</h2>
            </div>
            <div class="flex flex-wrap">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="post h-full space-y-2">
                        <div class="">
                            <h5 class="font-bold"><?php echo e($post['title']); ?></h5>
                        </div>
                        <div class="cover-min">
                            <a href="<?php echo e(route("post-detail.{$locale}", $post['id'])); ?>">
                                <img src="<?php echo e(asset('img/posts/thumbnails/' . $post['image'])); ?>"
                                    alt="<?php echo e($post['title']); ?>" class="">
                            </a>
                        </div>
                        
                        <div class="headline">
                            <div class="">
                                <p class="uppercase"><?php echo e($post['post_type']); ?></p>
                            </div>
                            <div class="date-info h-auto">
                                <p class="p12"><?php echo e($post['date']); ?></p>
                                <?php if(!is_null($post['location'])): ?>
                                    <p class="p12"><?php echo e($post['location']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="description">
                            <p class="p14"><?php echo e($post['description']); ?></p>
                        </div>
                        <div class="w-fi">
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
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/public/home.blade.php ENDPATH**/ ?>