<x-layouts.admin.app>
    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}
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
                            <strong>Imatge:</strong>
                            <img style="width: 100px; height: auto;" src="{{ asset('img/collab/'. ($collaborator["image"] ?? "collab-default.webp")) }}" alt="{{ ($collaborator["image"] ?? "collab-default.webp") . " - " }}">
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nom:</strong>
                            {{ $collaborator["name"] ?? ""}}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cognom:</strong>
                            {{ $collaborator["last_name"] ?? ""}}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Llenguatge:</strong>
                            {{ $collaborator["lang"] ?? ""}}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Biografia:</strong>
                            {{ $collaborator["biography"] ?? ""}}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Xarxa social:</strong>
                            {{ $collaborator["social_networks"] ?? ""}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.admin.app>
