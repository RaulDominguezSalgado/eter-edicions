<?php
    $locale = 'ca';
?>
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
    <h1 class="text-center">Resultats de cerca per a "<?php echo e($results['term']); ?>".</h1>
    <div class="flex justify-center mb-20">
        <?php if (isset($component)) { $__componentOriginal840a43871b8ea9967cfaeb6a4d4112b2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal840a43871b8ea9967cfaeb6a4d4112b2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.searchBar','data' => ['term' => $results['term']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('partials.searchBar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['term' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($results['term'])]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal840a43871b8ea9967cfaeb6a4d4112b2)): ?>
<?php $attributes = $__attributesOriginal840a43871b8ea9967cfaeb6a4d4112b2; ?>
<?php unset($__attributesOriginal840a43871b8ea9967cfaeb6a4d4112b2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal840a43871b8ea9967cfaeb6a4d4112b2)): ?>
<?php $component = $__componentOriginal840a43871b8ea9967cfaeb6a4d4112b2; ?>
<?php unset($__componentOriginal840a43871b8ea9967cfaeb6a4d4112b2); ?>
<?php endif; ?>
    </div>
    <?php if($results['books'] != []): ?>
        <h2 class="text-center mb-8">Llibres</h2>
        <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16 mb-40" id="catalog">
            <?php $__currentLoopData = $results['books']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="book flex flex-col items-center mb-6">
                    <div class="cover mb-4">
                        <a href="<?php echo e(route("book-detail.{$locale}", $book['id'])); ?>">
                            <img src="<?php echo e(asset('img/books/thumbnails/' . $book['image'])); ?>"
                                alt="<?php echo e($book['title']); ?>" style="height: 19.7em">
                        </a>
                    </div>
                    <div id="book-info-<?php echo e($book['slug']); ?>" class="flex flex-col items-center space-y-2 w-64">
                        <div class="book-title w-fit h-12 flex justify-center items-center text-center"><?php echo e($book['title']); ?></div>
                        <div class="flex space-x-1">
                            <?php $__currentLoopData = $book['collaborators']['authors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if(!$loop->last): ?>
                                    <div class="book-author"><?php echo e($author['full_name']); ?>,</div>
                                    
                                <?php else: ?>
                                    <div class="book-author"><?php echo e($author['full_name']); ?></div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="book-translator flex space-x-1 text-center">
                            <div class="book-translator">Traducció de
                            <?php $__currentLoopData = $book['collaborators']['translators']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $translator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$loop->last): ?>
                                    <?php echo e($translator['full_name']); ?>,
                                    
                                <?php else: ?>
                                    <?php echo e($translator['full_name']); ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
    <?php if($results['collaborators'] != []): ?>
        <h2 class="text-center mb-8">Col·laboradors</h2>
        <div class="w-full grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 px-16 mb-40" id="catalog">
            <?php $__currentLoopData = $results['collaborators']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="collaborator flex flex-col items-center mb-6 m-5">
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
    <?php endif; ?>
    <?php if($results['activities'] != []): ?>
        <h2 class="text-center mb-8">Events</h2>
        <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16 mb-40" id="catalog">
            <?php $__currentLoopData = $results['activities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <p class="uppercase"><?php echo e($post['title']); ?></p>
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
    <?php endif; ?>
    <?php if($results['articles'] != []): ?>
        <h2 class="text-center mb-8">Publicacions</h2>
        <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16 mb-40" id="catalog">
            <?php $__currentLoopData = $results['articles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <p class="uppercase"><?php echo e($post['title']); ?></p>
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
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?><?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/public/searchResults.blade.php ENDPATH**/ ?>