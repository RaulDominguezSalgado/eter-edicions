<?php
$locale = 'ca';
?>
<x-layouts.admin.app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="space-y-6">
                    <div class="">
                        <div class="flex justify-between items-center px-5 border-guide-1">
                            <div>
                                <h2>{{ $book['title'] }}</h2>
                            </div>
                            <div class="flex flex-col items-end space-y-6">
                                <div><a class="navigation-button font-bold" href="{{ route('books.index') }}">Enrere</a></div>
                            {{-- <a class="btn btn-sm btn-primary "
                                                        href="{{ route('book-detail.{$locale}', $book['slug']) }}" target="_blank"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar en catalogo') }}</a> --}}
                                <div><a href="{{ route('stock.edit', $book['id']) }}" class="underline">Gestionar stock</a></div>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body bg-white">
                        <form action="{{ route('books.update', $book['id']) }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            @include('admin.book.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.app>
