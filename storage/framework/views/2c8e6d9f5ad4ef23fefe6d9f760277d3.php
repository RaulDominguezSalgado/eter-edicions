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

    <link rel="stylesheet" href="<?php echo e(asset('css/public/book.css')); ?>">

    <main class="body space-y-4 mb-12">
        <div class="book">
            <div class="book-detail flex justify-between mb-4">
                <div class="mr-6 cover">
                    
                    
                    <img class="" src="<?php echo e(asset('img/books/covers/' . $book['image'])); ?>" alt="<?php echo e($book['title']); ?>">
                    
                </div>

                <div class="details flex flex-col space-y-3 justify-between h-auto">

                    <div class="flex flex-col space-y-2">
                        <div class="flex justify-between">
                            <div class="title-author flex flex-col space-y-1 w-full">
                                <div class="flex flex-row justify-between items-center">
                                    <h2><?php echo e($book['title']); ?></h2>
                                </div>
                                <div class="flex space-x-1">
                                    <?php $__currentLoopData = $book['authors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <?php if(!$loop->last): ?>
                                            <h4><?php echo e($author); ?>,</h4>
                                            
                                        <?php else: ?>
                                            <h4><?php echo e($author); ?></h4>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-5 items-baseline">
                            <div class="flex space-x-1.5" id="pvp">
                                <?php if($book['discounted_price']): ?>
                                    <h5 class="line-through text-red-600"><?php echo e($book['pvp']); ?>€</h5>
                                    <h5 class=""><?php echo e($book['discounted_price']); ?>€</h5>
                                <?php else: ?>
                                    <h5 class=""><?php echo e($book['pvp']); ?>€</h5>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div id="book-description" class="">
                            <?php if($book['headline']): ?>
                                <p class=""><strong><?php echo e($book['headline']); ?></strong></p>
                            <?php endif; ?>
                            <p><?php echo e($book['description']); ?></p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <a href="" class="sample flex space-x-2.5">
                            <img src="<?php echo e(asset('img/icons/download.webp')); ?>"
                                alt="Descarregar sample de <?php echo e($book['title']); ?>" class="clickable" style="width: 15px">
                            <small class="text-slate-600">Comença a llegir</small>
                        </a>

                        <div class="add-to-cart">
                            <input type="number" class=" border border-black" name="number_of_items" placeholder="1"
                                value="1">
                            <button type="submit" class="py-2.5 px-3 flex space-x-2 items-center">
                                <span class="flex items-center leading-none text-white">Afegir a la cistella</span>
                                <span class=""><img src="<?php echo e(asset('img/icons/add-to-cart-white.webp')); ?>"
                                        alt="Botó per afegir a la cistella" style="width: 15px"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <?php if($book['stock']): ?>
                    <div>
                        <small class="text-green-700">Disponible</small>
                    </div>
                <?php else: ?>
                    <div>
                        <small class="text-red-700">Ho sentim! Aquest llibre no està disponible</small>
                        <br>
                        <small>Pots trobar-lo a les <a href="" class="text-decoration-line: underline">llibreries
                                amb
                                qui treballem</a></small>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-8" id="infoTab">
            <div class="mb-8">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block hover:border-gray-950 active:border-gray-950 rounded-t-lg py-2 px-4 font-medium text-center border-transparent border-b active"
                            id="description-tab" data-tabs-target="#description" type="button" role="tab"
                            aria-controls="description" aria-selected="true">
                            <h5 class="">Descripció</h5>
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block hover:border-gray-950 active:border-gray-950 rounded-t-lg py-2 px-4 font-medium text-center border-transparent border-b"
                            id="technical-sheet-tab" data-tabs-target="#technical-sheet" type="button" role="tab"
                            aria-controls="technical-sheet" aria-selected="false">
                            <h5 class="">Fitxa tècnica</h5>
                        </button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent" class="mb-20">
                <div class="description flex flex-col space-y-4" id="description" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="collab flex space-x-6">
                            <div class="max-h-fit pic">
                                <a href="<?php echo e(route("collaborator-detail.{$locale}", $author['id'])); ?>">
                                    <img class="" src="<?php echo e(asset('img/collab/covers/' . $author['image'])); ?>"
                                        alt="Fotografia de <?php echo e($author['first_name']); ?> <?php echo e($author['last_name']); ?>">
                                </a>
                            </div>
                            <div class="info">
                                <div class="mb-6">
                                    <a href="<?php echo e(route("collaborator-detail.{$locale}", $author['id'])); ?>">
                                        <h3 class="font-bold mb-3"><?php echo e($author['first_name']); ?>

                                            <?php echo e($author['last_name']); ?>

                                        </h3>
                                    </a>
                                    <p class="text-justify"><?php echo e($author['biography']); ?></p>
                                </div>
                                <div>
                                    <?php if(array_key_exists('books', $author) && count($author['books']) > 1): ?>
                                        <h3 class="font-bold mb-3">Altres obres disponibles</h3>
                                        <div class="flex flex-col space-y-4">
                                            <?php $__currentLoopData = $author['books']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_author_book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($other_author_book['title'] != $book['title']): ?>
                                                    <p>> <a
                                                            href="<?php echo e(route("book-detail.{$locale}", $other_author_book['id'])); ?>"><?php echo e($other_author_book['title']); ?></a>
                                                    </p>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                    <?php $__currentLoopData = $translators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $translator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="collab flex space-x-6 justify-between">
                            <div class="info">
                                <div class="mb-8">
                                    <a href="<?php echo e(route("collaborator-detail.{$locale}", $translator['id'])); ?>">
                                        <h3 class="font-bold mb-3"><?php echo e($translator['first_name']); ?>

                                            <?php echo e($translator['last_name']); ?>

                                        </h3>
                                    </a>
                                    <p class="text-justify"><?php echo e($translator['biography']); ?></p>
                                </div>
                                <div>
                                    <?php if(array_key_exists('books', $translator) && count($translator['books']) > 1): ?>
                                        <h3 class="font-bold mb-3">Altres obres disponibles</h3>
                                        <div class="flex space-x-2">
                                            <?php $__currentLoopData = $translator['books']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_author_book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($other_author_book['title'] != $book['title']): ?>
                                                    <p>> <a
                                                            href="<?php echo e(route("book-detail.{$locale}", $other_author_book['id'])); ?>"><?php echo e($other_author_book['title']); ?></a>
                                                    </p>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="pic">
                                <a href="<?php echo e(route("collaborator-detail.{$locale}",$translator["id"])); ?>">
                                <img class="" src="<?php echo e(asset('img/collab/covers/' . $translator['image'])); ?>"
                                    alt="Fotografia de <?php echo e($translator['first_name']); ?> <?php echo e($translator['last_name']); ?>">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="technical-sheet hidden flex flex-col space-y-0.5" id="technical-sheet" role="tabpanel"
                    aria-labelledby="technical-sheet-tab">
                    <div class="mb-2">
                        <div class="flex" id="title">
                            <h4 class="font-bold text-transform:uppercase"><?php echo e($book['title']); ?></h4>
                        </div>
                        <div class="flex space-x-1.5" id="original">
                            <p><i><?php echo e($book['original_title']); ?></i> (<?php echo e($book['original_publication_date']); ?>),
                                <?php echo e($book['original_publisher']); ?></p>
                        </div>
                    </div>
                    <div class="flex space-x-1.5" id="authors">
                        <strong>Autoria: </strong>
                        <div class="flex space-x-1.5">
                            <?php $__currentLoopData = $book['authors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if(!$loop->last): ?>
                                    <p><?php echo e($author); ?>,</p>
                                    
                                <?php else: ?>
                                    <p><?php echo e($author); ?></p>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="flex space-x-1.5" id="translators">
                        <strong>Traducció: </strong>
                        <div class="flex space-x-1.5">
                            <?php $__currentLoopData = $book['translators']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $translator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if(!$loop->last): ?>
                                    <p><?php echo e($translator); ?>,</p>
                                    
                                <?php else: ?>
                                    <p><?php echo e($translator); ?></p>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php if(array_key_exists('extras', $book)): ?>
                        <div>
                            <?php $__currentLoopData = $book['extras']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex space-x-1.5" id="publisher">
                                    <strong><?php echo e($extra['key']); ?>: </strong>
                                    <p><?php echo e($extra['value']); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="flex space-x-1.5" id="publisher">
                        <strong>Edita: </strong>
                        <p><?php echo e($book['publisher']); ?></p>
                    </div>
                    <div class="flex space-x-1.5" id="collections">
                        <?php if(count($book['collections']) > 1): ?>
                            <strong>Col·leccions: </strong>
                        <?php else: ?>
                            <strong>Col·lecció: </strong>
                        <?php endif; ?>

                        <div class="flex space-x-1.5">
                            <?php $__currentLoopData = $book['collections']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if(!$loop->last): ?>
                                    <p><?php echo e($collection); ?>,</p>
                                    
                                <?php else: ?>
                                    <p><?php echo e($collection); ?></p>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="flex space-x-1.5" id="number_of_pages">
                        <strong>Pàgines: </strong>
                        <p><?php echo e($book['number_of_pages']); ?></p>
                    </div>
                    <div class="flex space-x-1.5" id="lang">
                        <?php if(count($book['lang']) > 1): ?>
                            <strong>Idiomes: </strong>
                        <?php else: ?>
                            <strong>Idioma: </strong>
                        <?php endif; ?>

                        <div class="flex space-x-1.5">
                            <?php $__currentLoopData = $book['lang']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$loop->last): ?>
                                    <p><?php echo e($lang); ?>,</p>
                                <?php else: ?>
                                    <p><?php echo e($lang); ?></p>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="flex space-x-1.5" id="publication_date">
                        <strong>Publicació: </strong>
                        <p><?php echo e($book['publication_date']); ?></p>
                    </div>
                    <div class="flex space-x-1.5" id="isbn">
                        <strong>ISBN: </strong>
                        <p><?php echo e($book['isbn']); ?></p>
                    </div>
                    <div class="flex space-x-1.5" id="isbn">
                        <strong>Dipòsit legal: </strong>
                        <p><?php echo e($book['legal_diposit']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php if(count($related_books) > 0): ?>
            <div id="related-books" class="flex flex-col items-center space-y-4">
                <h2>També et poden agradar</h2>

                <div class="flex">
                    <?php $__currentLoopData = $related_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $relatedBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="related-book flex flex-col items-center mb-6 w-64 px-6">
                            <div class="cover mb-4 flex justify-center">
                                <a href="<?php echo e(route("book-detail.{$locale}", $relatedBook['id'])); ?>">
                                    <img src="<?php echo e(asset('img/books/thumbnails/' . $relatedBook['image'])); ?>"
                                        alt="<?php echo e($relatedBook['title']); ?>" style="height: 13.75em"
                                        class="aspect-[2/3]">
                                </a>
                            </div>
                            <div id="book-info-<?php echo e($relatedBook['slug']); ?>"
                                class="flex flex-col items-center space-y-2 w-full">
                                <div class="book-title flex justify-center items-center text-center">
                                    <?php echo e($relatedBook['title']); ?>

                                </div>
                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        </main>

    
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    <script src=<?php echo e(asset('js/components/popover.js')); ?>></script>
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
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/public/book.blade.php ENDPATH**/ ?>