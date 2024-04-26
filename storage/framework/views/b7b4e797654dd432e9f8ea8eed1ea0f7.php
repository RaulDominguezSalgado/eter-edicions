<?php
$locale = 'ca';
?>

<nav id="main-nav" class="mb-6">
    <a href="<?php echo e(route("home.{$locale}")); ?>" class="logo">
        <img src="<?php echo e(asset('img/logo/lg/logo_eter_black.webp')); ?>" alt="Logotip d'Èter Edicions" style="width: 5em">
    </a>
    <ul class="">
        <li class=""><a href="<?php echo e(route("home.{$locale}")); ?>" <?php if(Route::currentRouteName() == "home.{$locale}"): ?> class="active" <?php endif; ?>>Portada</a></li>
        <li class=""><a href="<?php echo e(route("catalog.{$locale}")); ?>" <?php if(Route::currentRouteName() == "catalog.{$locale}"): ?> class="active" <?php endif; ?>>Catàleg</a></li>
        <li class=""><a href="<?php echo e(route("collaborators.{$locale}")); ?>" <?php if(Route::currentRouteName() == "collaborators.{$locale}"): ?> class="active" <?php endif; ?>>Autors</a></li>
        <li class=""><a href="<?php echo e(route("agency.{$locale}")); ?>" <?php if(Route::currentRouteName() == "agency.{$locale}"): ?> class="active" <?php endif; ?>>Agència</a></li>
        <li class=""><a href="<?php echo e(route("activities.{$locale}")); ?>" <?php if(Route::currentRouteName() == "activities.{$locale}"): ?> class="active" <?php endif; ?>>Activitats</a></li>
        <li class=""><a href="<?php echo e(route("posts.{$locale}")); ?>" <?php if(Route::currentRouteName() == "posts.{$locale}"): ?> class="active" <?php endif; ?>>Articles</a></li>
        <li class=""><a href="<?php echo e(route("about.{$locale}")); ?>" <?php if(Route::currentRouteName() == "about.{$locale}"): ?> class="active" <?php endif; ?>>Qui som</a></li>
    </ul>
    <div>
        <?php if (isset($component)) { $__componentOriginal840a43871b8ea9967cfaeb6a4d4112b2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal840a43871b8ea9967cfaeb6a4d4112b2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.searchBar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('partials.searchBar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
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
</nav>

<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/components/layouts/navigate.blade.php ENDPATH**/ ?>