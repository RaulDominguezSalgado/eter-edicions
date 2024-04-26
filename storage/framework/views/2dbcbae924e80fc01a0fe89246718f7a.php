<?php
$locale = 'ca';
?>

<footer id="main-footer" class="flex space-between items-center">
    <div class="flex flex-col space-y-3">
        <a href="<?php echo e(route("home.{$locale}")); ?>" class="logo">
            <img src="<?php echo e(asset('img/logo/sm/logo_eter_white.webp')); ?>" alt="Logotip d'Èter Edicions">
        </a>
        <div>
            <p>SERVEIS EDITORIALS ÈTER S.L</p>
            <p>Sant Gil 16, 3-1</p>
            <p>08001 Barcelona</p>
        </div>
    </div>
    <div class="flex space-x-6 items-center">
        <a href="https://www.facebook.com/people/%C3%88ter-Edicions-%D8%AF%D8%A7%D8%B1-%D8%A7%D9%84%D8%A3%D8%AB%D9%8A%D8%B1/100089381536837" target="_blank"><img src="<?php echo e(asset('img/icons/FacebookF.webp')); ?>" alt="Instagram d'Èter Edicions" style="width:45px"></a>
        <a href="https://www.instagram.com/eteredicions/" target="_blank"><img src="<?php echo e(asset('img/icons/Instagram.webp')); ?>" alt="Facebook d'Èter Edicions" style="width:45px"></a>
        <a href="https://twitter.com/eteredicions" target="_blank"><img src="<?php echo e(asset('img/icons/TwitterX.webp')); ?>" alt="Twitter d'Èter Edicions" style="width:45px"></a>
    </div>
    <div>
        <ul>
            <li><a href="">Política de privacitat</a></li>
            <li><a href="">Política de cookies</a></li>
            <li><a href="">Avís legal</a></li>
            <li><a href="<?php echo e(route("contact.{$locale}")); ?>">Contacta</a></li>
        </ul>
    </div>
    <div>
        <ul>
            <li><a href="<?php echo e(route("catalog.{$locale}")); ?>">Catàleg</a></li>
            <li><a href="<?php echo e(route("bookstores.{$locale}")); ?>">Llibreries</a></li>
            <li><a href="<?php echo e(route("agency.{$locale}")); ?>">Agència</a></li>
            <li><a href="<?php echo e(route("foreign-rights.{$locale}")); ?>">Foreign rights</a></li>
            <li><a href="<?php echo e(route("about.{$locale}")); ?>">Qui som</a></li>
        </ul>
    </div>
</footer>
<?php /**PATH /var/www/html/asignaturas/proyecto-final/laravel_2.1/resources/views/components/layouts/footer.blade.php ENDPATH**/ ?>