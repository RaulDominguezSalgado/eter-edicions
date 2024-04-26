<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    
    <link rel="stylesheet" href="/css/admin/main.css">
    <link rel="stylesheet" href="/css/admin/form.css">
    <link rel="stylesheet" href="/css/admin/nav.css">
    <link rel="stylesheet" href="/css/admin/table.css">
    <script src="/js/admin/nav.js"></script>
    <script src="/js/book/book.js"></script>
    <title><?php echo e($title ?? 'Èter Edicions'); ?></title>
    
</head>
<body class="flex space-x-10">
    <?php if (isset($component)) { $__componentOriginal1c61857038aca0021aecf3eab9193ced = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c61857038aca0021aecf3eab9193ced = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin.navigate','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.admin.navigate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c61857038aca0021aecf3eab9193ced)): ?>
<?php $attributes = $__attributesOriginal1c61857038aca0021aecf3eab9193ced; ?>
<?php unset($__attributesOriginal1c61857038aca0021aecf3eab9193ced); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c61857038aca0021aecf3eab9193ced)): ?>
<?php $component = $__componentOriginal1c61857038aca0021aecf3eab9193ced; ?>
<?php unset($__componentOriginal1c61857038aca0021aecf3eab9193ced); ?>
<?php endif; ?>
    <main>
        <?php echo e($slot); ?>

    </main>
</body>

</html>
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/components/layouts/admin/app.blade.php ENDPATH**/ ?>