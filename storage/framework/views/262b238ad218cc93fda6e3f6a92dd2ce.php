<?php
$locale = 'ca';
?>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="space-y-6">
                    <div class="">
                        <div class="flex justify-between items-center px-5 border-guide-1">
                            <div>
                                <h2><?php echo e($book['title']); ?></h2>
                            </div>
                            <div class="flex flex-col items-end space-y-6">
                                <div><a class="navigation-button font-bold" href="<?php echo e(route('books.index')); ?>">Enrere</a></div>
                            
                                <div><a href="<?php echo e(route('stock.edit', $book['id'])); ?>" class="underline">Gestionar stock</a></div>
                            </div>
                        </div>
                    </div>
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success m-4">
                            <p><?php echo e($message); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="card-body bg-white">
                        <form action="<?php echo e(route('books.update', $book['id'])); ?>" method="POST" role="form"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo $__env->make('admin.book.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
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
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/admin/book/edit.blade.php ENDPATH**/ ?>