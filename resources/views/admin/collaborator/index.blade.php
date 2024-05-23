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

                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold"></strong>
                            <span class="block sm:inline">{{ $message }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    onclick="removeParentDiv(this.parentNode)">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    @elseif (session('error'))
                        {{-- <div class="alert alert-danger">{{ session('error') }}</div> --}}
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Error:</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    onclick="removeParentDiv(this.parentNode)">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    @elseif ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Error: .</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    onclick="removeParentDiv(this.parentNode)">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
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
                                        {{-- <th>Llenguatge</th> --}}
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
                                    <tr class="border-b-2 border-dark">
                                        <form action="{{ route('collaborators.index.post') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <td>
                                                <div class="flex">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="name" id="name"
                                                        placeholder="Nom" value="{{ $old['name'] ?? '' }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">

                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <input type="submit" value="Cerca" name="search[search]">
                                                    <input type="submit" value="Restaura" name="search[clear]">
                                                </div>
                                            </td>
                                        </form>
                                    </tr>

                                    @foreach ($collaboratorsArray as $collaborator)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img style="width: 100px; height: auto;"
                                                    src="{{ asset('img/collab/thumbnails/' . $collaborator['image']) }}"
                                                    alt="{{ $collaborator['image'] }}">
                                            </td>
                                            <td>{{ $collaborator['full_name'] }}</td>
                                            {{-- <td>{{ $collaborator['lang'] }}</td> --}}
                                            <td>
                                                @foreach ($collaborator['social_networks'] as $key => $value)
                                                    <p><a href="{{ $value }}"
                                                            target="blank">{{ $key }}</a></p>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('collaborators.show', $collaborator['id']) }}"><i
                                                        class="fa fa-fw fa-eye"></i> {{ __('Vista prèvia') }}</a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('collaborators.edit', $collaborator['id']) }}"><i
                                                        class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="document.getElementById('confirmDelete-{{ $collaborator['id'] }}').classList.remove('hidden');">
                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Esborrar') }}
                                                </button>
                                            </td>
                                        </tr>

                                        {{-- Modal de confirmació --}}
                                        @include('components.layouts.admin.delete-confirmation-modal', [
                                            'id' => $collaborator['id'],
                                            'message' => __('Segur que voleu suprimir aquest recurs?'),
                                            'action' => route('collaborators.destroy', $collaborator['id']),
                                        ])
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
<script src="{{ asset('js/form/alert.js') }}"></script>
