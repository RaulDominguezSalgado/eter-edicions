<?php
$locale = 'ca';
//TODO Change locale
?>
<nav id="admin-nav" class="flex flex-col space-y-8 items-center">
    <a href="<?php echo e(route("home.{$locale}")); ?>" class="logo"><img src="/img/logo/lg/logo_eter_black.webp"></a>

    <ul class="">
        
        <li><a class="has-icon" href="<?php echo e(route('orders.index')); ?>" <?php if(Route::currentRouteName() == 'orders.index'): ?> class="active" <?php endif; ?>><img src="/img/icons/order.webp"><span>Comandes</span></a></li>
        <li><a class="has-icon" href="<?php echo e(route('books.index')); ?>" <?php if(Route::currentRouteName() == 'books.index'): ?> class="active" <?php endif; ?>><img src="/img/icons/catalog.webp"><span>Catàleg</span></a></li>
        <li><a class="has-icon" href="<?php echo e(route('collections.index')); ?>" <?php if(Route::currentRouteName() == 'collections.index'): ?> class="active" <?php endif; ?>><img src="/img/icons/collections.webp"><span>Col·leccions</span></a></li>
        <li class="has-child">
            <a class="has-icon" href="<?php echo e(route('collaborators.index')); ?>" <?php if(Route::currentRouteName() == 'collaborators.index'): ?> class="active" <?php endif; ?>><img src="/img/icons/collaborators.webp"><span>Col·laboradors</span></a>
            
            
        </li>
        <li><a class="has-icon" href="<?php echo e(route('bookstores.index')); ?>"><img src="/img/icons/bookstores.webp"><span>Llibreries</span></a></li>
        <li class="has-child">
            <a class="has-icon" href=""><img src="/img/icons/posts.webp"><span>Publicacions</span></a>
            
        </li>
        <li><a class="has-icon" href=""><img src="/img/icons/pages.webp"><span>Pàgines</span></a></li>
        <li><a class="has-icon" href="<?php echo e(route('users.index')); ?>"><img src="/img/icons/users.webp"><span>Usuaris</span></a></li>
        <li><a class="has-icon" href="<?php echo e(route('users.index')); ?>"><img src="/img/icons/settings.webp"><span>Configuració</span></a></li>
    </ul>
</nav>
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/components/layouts/admin/navigate.blade.php ENDPATH**/ ?>