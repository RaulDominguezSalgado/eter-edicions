<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>
<div class="p-3">
    <form action="{{ route("search.{$locale}") }}" method="GET" class="flex">
        {{-- <div class="flex border border-dark">
            <i class="icon search"></i>
            <input type="text" name="search_term" value="{{ $term ?? '' }}" class="search-box border-0 cursor-pointer" placeholder={{__('general.search')}}>
        </div> --}}
        <input type="text" name="search_term" value="{{ $term ?? '' }}">
            <input type="submit" value={{__('general.search')}} class="bg-light border-s-0 border-t border-e border-b border-black p-2 cursor-pointer">
    </form>
</div>
