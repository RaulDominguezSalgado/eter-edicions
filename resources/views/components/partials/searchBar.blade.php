<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>
<div class="lg:max-w-48">
    <form action="{{ route("search.{$locale}") }}" method="GET" class="flex border border-dark">
        <input class="w-full border-0" type="text" name="search_term" value="{{ $term ?? '' }}"
            placeholder="{{ __('general.search') }}">
        <button type="submit" value={{ __('general.search') }}
            class="bg-light p-2 cursor-pointer hover:bg-dark hover:text-light">
            <i class="icon search"></i>
        </button>
    </form>
</div>
<script src="{{asset('/js/front/validations.js')}}"></script>
