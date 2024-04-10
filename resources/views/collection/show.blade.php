@extends('layouts.app')

@section('template_title')
    {{ $collection->name ?? __('Show') . " " . __('Collection') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Collection</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('collections.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group mb-2 mb20">
                            <strong>Llenguatge:</strong>
                            {{ $collection['lang'] ?? '' }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Nom:</strong>
                            {{ $collection['name'] ?? '' }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Descripció:</strong>
                            {{ $collection['description'] ?? '' }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Slug:</strong>
                            {{ $collection['slug'] ?? '' }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
