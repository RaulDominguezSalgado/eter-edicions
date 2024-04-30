<?php
    Config::get('app.locale')
?>
<div class="p-3">
    <form action="{{ route("search.{$locale}")}}" method="GET" class="flex">
        <input type="text" name="search_term" value="{{ $term ?? '' }}">
        <input type="submit" value="Cerca" class="bg-gray-200 border border-black p-2 cursor-pointer">
    </form>
</div>
