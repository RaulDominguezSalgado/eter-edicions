<x-layouts.admin.app>
    @push('styles')
    <style>
        .hidden {
            display: none;
        }
    </style>
    @endpush
    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h2>Gestió de col·laboradors</h2>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @elseif ($message = Session::get('error'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Imatge</th>
                                        <th>Nom</th>
                                        <th>Llenguatge</th>
                                        <th>Xarxes Socials Networks</th>

                                        <th><a href="{{ route('collaborators.create') }}">
                                                <div
                                                    class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                    <img src="{{ asset('img/icons/plus.webp') }}"
                                                        alt="Afegir nou llibre" class="add w-2.5 h-2.5">
                                                    <p class="">Nou</p>
                                                </div>
                                            </a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($collaboratorsArray as $collaborator)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img style="width: 100px; height: auto;"
                                                    src="{{ asset('img/collab/thumbnails/' . $collaborator['image']) }}"
                                                    alt="{{ $collaborator['image'] . ' - ' }}">
                                            </td>
                                            <td>{{ $collaborator['full_name'] }}</td>
                                            <td>{{ $collaborator['lang'] }}</td>
                                            <td>
                                                @foreach ($collaborator['social_networks'] as $key => $value)
                                                    <p><a href="{{ $value }}"
                                                            target="blank">{{ $key }}</a></p>
                                                @endforeach ()
                                            </td>

                                            <td>
                                                <form
                                                    action="{{ route('collaborators.destroy', $collaborator['id']) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('collaborators.show', $collaborator['id']) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('collaborators.edit', $collaborator['id']) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById('confirmDelete').classList.remove('hidden');">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>

                                                <div id="confirmDelete" class="hidden">
                                                    <p>¿Estás seguro de que deseas eliminar este colaborador? Esta
                                                        acción no se puede deshacer.</p>
                                                    <button
                                                        onclick="document.getElementById('deleteForm').submit();">Sí,
                                                        eliminar</button>
                                                    <button
                                                        onclick="document.getElementById('confirmDelete').classList.add('hidden');">Cancelar</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                    @foreach ($collaboratorsArray as $collaborator)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            <img style="width: 100px; height: auto;" src="{{ asset('img/collab/thumbnails/' . $collaborator['image']) }}" alt="{{ $collaborator['image'] }}">
                                        </td>
                                        <td>{{ $collaborator['full_name'] }}</td>
                                        <td>{{ $collaborator['lang'] }}</td>
                                        <td>
                                            @foreach ($collaborator['social_networks'] as $key => $value)
                                            <p><a href="{{ $value }}"
                                                    target="blank">{{ $key }}</a></p>
                                        @endforeach
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('collaborators.show', $collaborator['id']) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Vista prèvia') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('collaborators.edit', $collaborator['id']) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById('confirmDelete-{{ $collaborator['id'] }}').classList.remove('hidden');">
                                                <i class="fa fa-fw fa-trash"></i> {{ __('Esborrar') }}
                                            </button>
                                        </td>
                                    </tr>

                                  {{-- Modal de confirmació --}}
                                  @include('components.layouts.admin.delete-confirmation-modal', ['id' => $collaborator['id'], 'message' =>  __('Segur que voleu suprimir aquest recurs?'), 'action' => route('collaborators.destroy', $collaborator['id'])])


                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $collaborators->links() !!}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
