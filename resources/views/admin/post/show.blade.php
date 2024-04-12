@extends('layouts.app')

@section('template_title')
    {{ $post->name ?? __('Show') . " " . __('Post') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Post</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Title:</strong>
                            {{ $post->title }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Author Id:</strong>
                            {{ $post->author_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Translator Id:</strong>
                            {{ $post->translator_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Description:</strong>
                            {{ $post->description }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Date:</strong>
                            {{ $post->date }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Image:</strong>
                            {{ $post->image }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Content:</strong>
                            {{ $post->content }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Publication Date:</strong>
                            {{ $post->publication_date }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Published By:</strong>
                            {{ $post->published_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
