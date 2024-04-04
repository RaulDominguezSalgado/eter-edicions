@extends('layouts.app')

@section('template_title')
    {{ $collaborator->name ?? __('Show') . " " . __('Collaborator') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Collaborator</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('collaborators.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Image:</strong>
                            {{ $collaborator->image }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Social Networks:</strong>
                            {{ $collaborator->social_networks }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
