<?php
Config::get('app.locale')
?>
<x-layouts.admin.app>
    <div>
        <div class="space-y-6">
            <div class="">
                <div class="flex justify-between items-end px-2.5">
                    <div>
                        <h2>{{ $book['title'] }}</h2>
                    </div>
                    <div class="flex flex-col items-end space-y-6">
                        <div><a class="navigation-button font-bold" href="{{ route('books.index') }}">Enrere</a></div>
                    </div>
                </div>
            </div>
            @if (session('success'))
                {{-- <div class="alert alert-danger">{{ session('error') }}</div> --}}
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            onclick="removeParentDiv(this.parentNode)">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">No s'han pogut actualitzar les dades del llibre.</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-systemerror" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            onclick="removeParentDiv(this.parentNode)">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <div class="">
                <form action="{{ route('books.update', $book['id']) }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    @include('admin.book.edit-form')
                </form>
            </div>
        </div>
</x-layouts.admin.app>
<script src="/js/book/edit.js"></script>
