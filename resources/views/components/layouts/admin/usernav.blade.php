<?php
// Config::get('app.locale')
$locale = 'ca';
?>
<nav class="flex justify-end items-center">
    <div class="relative">
        <div id="user" class="w-auto">
            <button type="button" id="userSelectExpand" class="flex items-center" onclick="toggleSelect(this)">
                <i class="icon user text-[14px]"></i>
                <div class="p14 flex leading-3 me-2">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                <i class="icon expand-arrow text-[10px]"></i>
            </button>
        </div>
        <div id="userForm" class="user-select w-auto absolute top-6 right-0 bg-light before:border-s-transparent z-20">
        {{-- <div id="userForm" class="user-select absolute top-6 right-0 w-full flex flex-col items-end border bg-light pl-1.5 pt-0.5 pr-1.5 pb-1.5"> --}}
            <form action="{{route('admin_dashboard')}}" method="GET" id="dashboard" class="min-w-max w-full flex justify-start items-center hover:bg-surfacemedium py-3 pb-2 px-3">
                @csrf
                <button type="submit" class="flex space-x-0.5">
                    <i class="icon control-panel"></i>
                    <p class="p12">Panell de control</p>
                </button>
            </form>
            <form action="{{route('user-profile-information.edit')}}" method="GET" id="dashboard" class="min-w-max w-full flex justify-start items-center hover:bg-surfacemedium py-3 px-3">
                @csrf
                <button type="submit" class="flex space-x-0.5">
                    <i class="icon settings"></i>
                    <p class="p12">Configuració del compte</p>
                </button>
            </form>
            <form action="{{route('logout')}}" method="POST" id="logout" class="min-w-max w-full flex justify-start items-center hover:bg-surfacemedium py-3 px-3">
                @csrf
                <button type="submit" class="flex space-x-0.5">
                    <i class="icon logout"></i>
                    <p class="p12">Tancar sessió</p>
                </button>
            </form>
        </div>
    </div>
</nav>
<link rel="stylesheet" href="/css/icons.css">
