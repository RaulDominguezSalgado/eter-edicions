<?php
    $locale = "ca";
?>
<x-layouts.admin.app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <a href="{{ route('books.index') }}">Torna a l'index</a>
                                {{--<a class="btn btn-sm btn-primary "
                                                        href="{{ route('book-detail.{$locale}', $book['slug']) }}" target="_blank"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar en catalogo') }}</a>--}}
                                <h1>Editant "{{ $book['title'] }}"</h1>
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body bg-white">
                        <form action="{{ route( 'books.update', $book['id'] ) }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            @include("admin.book.form");
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.app>
