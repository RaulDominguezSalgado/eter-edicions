<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/front/nav.css">
    <link rel="stylesheet" href="/css/front/footer.css">
    <title><?php echo e($title ?? 'Èter Edicions'); ?></title>
    
</head>
<body>
    <?php if (isset($component)) { $__componentOriginal1d8ef922ac365eda0ce4f262cbf73c89 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1d8ef922ac365eda0ce4f262cbf73c89 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.navigate','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.navigate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1d8ef922ac365eda0ce4f262cbf73c89)): ?>
<?php $attributes = $__attributesOriginal1d8ef922ac365eda0ce4f262cbf73c89; ?>
<?php unset($__attributesOriginal1d8ef922ac365eda0ce4f262cbf73c89); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1d8ef922ac365eda0ce4f262cbf73c89)): ?>
<?php $component = $__componentOriginal1d8ef922ac365eda0ce4f262cbf73c89; ?>
<?php unset($__componentOriginal1d8ef922ac365eda0ce4f262cbf73c89); ?>
<?php endif; ?>
    <?php echo e($slot); ?>

    <?php if (isset($component)) { $__componentOriginal2851f1e47c9108aacbab05e6d2ec4a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2851f1e47c9108aacbab05e6d2ec4a68 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2851f1e47c9108aacbab05e6d2ec4a68)): ?>
<?php $attributes = $__attributesOriginal2851f1e47c9108aacbab05e6d2ec4a68; ?>
<?php unset($__attributesOriginal2851f1e47c9108aacbab05e6d2ec4a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2851f1e47c9108aacbab05e6d2ec4a68)): ?>
<?php $component = $__componentOriginal2851f1e47c9108aacbab05e6d2ec4a68; ?>
<?php unset($__componentOriginal2851f1e47c9108aacbab05e6d2ec4a68); ?>
<?php endif; ?>
</body>
</html>
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/components/layouts/app.blade.php ENDPATH**/ ?>