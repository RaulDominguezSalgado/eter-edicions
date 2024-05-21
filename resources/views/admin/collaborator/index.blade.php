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
                                            <a class="btn btn-sm btn-primary" href="{{ route('collaborators.show', $collaborator['id']) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('collaborators.edit', $collaborator['id']) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById('confirmDelete-{{ $collaborator['id'] }}').classList.remove('hidden');">
                                                <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                            </button>
                                        </td>
                                    </tr>

                                  {{-- Modal de confirmació --}}
                                  @include('components.layouts.admin.delete-confirmation-modal', ['id' => $collaborator['id'], 'message' => '¿Estás seguro de que deseas eliminar este colaborador? Esta acción no se puede deshacer.', 'action' => route('collaborators.destroy', $collaborator['id'])])

                                    {{-- <div id="confirmDelete-{{ $collaborator['id'] }}" class="fixed z-10 inset-0 overflow-y-auto hidden bg-gray-500 bg-opacity-75">
                                        <div class="flex items-center justify-center min-h-screen">
                                            <div class="bg-white rounded-lg overflow-hidden shadow-xl sm:max-w-lg sm:w-full">
                                                <div class="bg-gray-100 px-4 pt-5 pb-4 sm:p-6">
                                                    <div class="sm:flex sm:items-start">
                                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-200 sm:mx-0 sm:h-10 sm:w-10">
                                                            <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7H7v6m6 0h6m-6-6V3m0 12v6m0-6H7m6 0h6" />
                                                            </svg>
                                                        </div>
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Eliminar colaborador</h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-700">¿Estás seguro de que deseas eliminar este colaborador? Esta acción no se puede deshacer.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <form action="{{ route('collaborators.destroy', $collaborator['id']) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-gray-100 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                            Sí, eliminar
                                                        </button>
                                                    </form>
                                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" onclick="document.getElementById('confirmDelete-{{ $collaborator['id'] }}').classList.add('hidden');">
                                                        Cancelar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

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
