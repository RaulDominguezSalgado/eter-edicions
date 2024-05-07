<?php
// Config::get('app.locale')
$locale = 'ca';
?>
<nav class="flex justify-end items-center">
    <div class="relative">
        <div id="user" class="">
            <button type="button" id="userSelectExpand" class="flex items-center" onclick="toggleSelect(this)">
                <i class="icon user text-[14px]"></i>
                <div class="p14 flex leading-3 me-2">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                <i class="icon expand-arrow text-[10px]"></i>
            </button>
        </div>
        <div id="userForm" class="user-select absolute top-6 right-0 bg-light before:border-s-transparent">
        {{-- <div id="userForm" class="user-select absolute top-6 right-0 w-full flex flex-col items-end border bg-light pl-1.5 pt-0.5 pr-1.5 pb-1.5"> --}}
            <form action="{{route('admin_dashboard')}}" method="GET" id="dashboard" class="w-full flex justify-end items-center hover:bg-surfacemedium py-1 pb-2 px-3">
                @csrf
                <button type="submit" class="">Dashboard</button>
            </form>
            <form action="{{route('logout')}}" method="POST" id="logout" class="w-full flex justify-end items-center hover:bg-surfacemedium py-1 pb-2 px-3">
                @csrf
                <button type="submit" class="">Tancar sessió</button>
            </form>
        </div>
    </div>
</nav>
<link rel="stylesheet" href="/css/icons.css">
