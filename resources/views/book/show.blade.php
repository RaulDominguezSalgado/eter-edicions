@extends('layouts.app')

@section('template_title')
    {{ $book->name ?? __('Show') . " " . __('Book') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Book</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('books.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Isbn:</strong>
                            {{ $book->isbn }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Publisher:</strong>
                            {{ $book->publisher }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Image:</strong>
                            {{ $book->image }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Pvp:</strong>
                            {{ $book->pvp }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Iva:</strong>
                            {{ $book->iva }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Discounted Price:</strong>
                            {{ $book->discounted_price }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Stock:</strong>
                            {{ $book->stock }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Visible:</strong>
                            {{ $book->visible }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
