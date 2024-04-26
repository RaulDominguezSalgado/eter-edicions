<?php if (isset($component)) { $__componentOriginal3c1a7eb7a081e8a17564aebc3f26e2b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c1a7eb7a081e8a17564aebc3f26e2b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.admin.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php
    // dd($books[0]);
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h2>Gestió del catàleg</h2>

                            <div class="float-right">

                            </div>
                        </div>
                    </div>
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success m-4">
                            <p><?php echo e($message); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <th></th>
                                    <th>Imatge</th>
                                    <th>ISBN</th>
                                    <th>Títol</th>
                                    <th>Autors</th>
                                    <th>Traductors</th>
                                    <th>PVP </th>
                                    <th>Preu amb descompte</th>
                                    <th colspan="1">Stock</th>
                                    <th>Visible</th>
                                    <th> <a href="<?php echo e(route('books.create')); ?>">
                                            <div  class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                <img src="<?php echo e(asset('img/icons/plus.webp')); ?>" alt="Afegir nou llibre" class="add w-2.5 h-2.5">
                                                <p class="">Nou</p>
                                            </div>
                                        </a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>
                                                <a href="<?php echo e(route('books.edit', $book['id'])); ?>"><img
                                                        style="width: 100px; height: auto;"
                                                        src="<?php echo e(asset('img/books/thumbnails/' . $book['image'])); ?>"
                                                        alt="<?php echo e($book['title']); ?>"></a>
                                            </td>
                                            <td><?php echo e($book['isbn']); ?></td>
                                            <td><?php echo e($book['title']); ?></td>
                                            <td>
                                                <?php
                                                for ($i = 0; $i < count($book['collaborators']['authors']); $i++) {
                                                    if ($i != 0) {
                                                        echo ', ';
                                                    }
                                                    echo $book['collaborators']['authors'][$i]['full_name'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                for ($i = 0; $i < count($book['collaborators']['translators']); $i++) {
                                                    if ($i != 0) {
                                                        echo ', ';
                                                    }
                                                    echo $book['collaborators']['translators'][$i]['full_name'];
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo e($book['pvp']); ?>€</td>
                                            <?php
                                            if ($book['discounted_price'] == null) {
                                                $book['discounted_price'] = 'N/D';
                                            } else {
                                                $book['discounted_price'] = $book['discounted_price'] . ' €';
                                            }
                                            ?>
                                            <td><?php echo e($book['discounted_price']); ?></td>
                                            <td><?php echo e($book['stock']); ?></td>
                                            <?php if($book['visible']): ?>
                                                <td>✔</td>
                                            <?php else: ?>
                                                <td><span>x</span></td>
                                            <?php endif; ?>
                                            
                                            <td>
                                                <form action="<?php echo e(route('books.destroy', $book['id'])); ?>"
                                                    method="POST">
                                                    
                                                    <a class="btn btn-sm btn-success"
                                                        href="<?php echo e(route('books.edit', $book['id'])); ?>"><i
                                                            class="fa fa-fw fa-edit"></i> <?php echo e(__('Editar')); ?></a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i>
                                                        <?php echo e(__('Eliminar')); ?></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c1a7eb7a081e8a17564aebc3f26e2b9)): ?>
<?php $attributes = $__attributesOriginal3c1a7eb7a081e8a17564aebc3f26e2b9; ?>
<?php unset($__attributesOriginal3c1a7eb7a081e8a17564aebc3f26e2b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c1a7eb7a081e8a17564aebc3f26e2b9)): ?>
<?php $component = $__componentOriginal3c1a7eb7a081e8a17564aebc3f26e2b9; ?>
<?php unset($__componentOriginal3c1a7eb7a081e8a17564aebc3f26e2b9); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/admin/book/index.blade.php ENDPATH**/ ?>