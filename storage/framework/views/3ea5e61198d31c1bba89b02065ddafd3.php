<?php
    $locale = 'ca';
?>
<div class="p-3">
    <form action="<?php echo e(route("search.{$locale}")); ?>" method="GET" class="flex">
        <input type="text" name="search_term" value="<?php echo e($term ?? ''); ?>">
        <input type="submit" value="Cerca" class="bg-gray-200 border border-black p-2 cursor-pointer">
    </form>
</div><?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/components/partials/searchBar.blade.php ENDPATH**/ ?>