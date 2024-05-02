<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>
<div class="p-3">
    <form action="{{ route("search.{$locale}") }}" method="GET" class="flex">
        <input type="text" name="search_term" value="{{ $term ?? '' }}">
        <input type="submit" value={{__('general.search')}} class="bg-gray-200 border border-black p-2 cursor-pointer">
    </form>
</div>
