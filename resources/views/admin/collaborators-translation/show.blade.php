@extends('layouts.app')

@section('template_title')
    {{ $collaboratorsTranslation->name ?? __('Show') . " " . __('Collaborators Translation') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Collaborators Translation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('collaborators-translations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Collaborator Id:</strong>
                            {{ $collaboratorsTranslation->collaborator_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Lang:</strong>
                            {{ $collaboratorsTranslation->lang }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $collaboratorsTranslation->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Last Name:</strong>
                            {{ $collaboratorsTranslation->last_name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Biography:</strong>
                            {{ $collaboratorsTranslation->biography }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
