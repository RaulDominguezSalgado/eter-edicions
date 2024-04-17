<?php
$locale = 'ca';
?>

<footer id="main-footer" class="flex space-between items-center">
    <div class="flex flex-col space-y-3">
        <a href="{{ route("home.{$locale}") }}" class="logo">
            <img src="{{asset('img/logo/sm/logo_eter_white.webp')}}" alt="Logotip d'Èter Edicions">
        </a>
        <div>
            <p>SERVEIS EDITORIALS ÈTER S.L</p>
            <p>Sant Gil 16, 3-1</p>
            <p>08001 Barcelona</p>
        </div>
    </div>
    <div class="flex space-x-6 items-center">
        <a href="https://www.facebook.com/people/%C3%88ter-Edicions-%D8%AF%D8%A7%D8%B1-%D8%A7%D9%84%D8%A3%D8%AB%D9%8A%D8%B1/100089381536837"><img src="{{asset('img/icons/FacebookF.webp')}}" alt="Instagram d'Èter Edicions" style="width:45px"></a>
        <a href="https://www.instagram.com/eteredicions/"><img src="{{asset('img/icons/Instagram.webp')}}" alt="Facebook d'Èter Edicions" style="width:45px"></a>
        <a href="https://twitter.com/eteredicions"><img src="{{asset('img/icons/TwitterX.webp')}}" alt="Twitter d'Èter Edicions" style="width:45px"></a>
    </div>
    <div>
        <ul>
            <li><a href="">Política de privacitat</a></li>
            <li><a href="">Política de cookies</a></li>
            <li><a href="">Avís legal</a></li>
            <li><a href="{{route("contact.{$locale}")}}">Contacta</a></li>
        </ul>
    </div>
    <div>
        <ul>
            <li><a href="{{route("catalog.{$locale}")}}">Catàleg</a></li>
            <li><a href="{{route("bookstores.{$locale}")}}">Llibreries</a></li>
            <li><a href="{{route("agency.{$locale}")}}">Agència</a></li>
            <li><a href="{{route("foreign-rights.{$locale}")}}">Foreign rights</a></li>
            <li><a href="{{route("about.{$locale}")}}">Qui som</a></li>
        </ul>
    </div>
</footer>
