<x-layouts.admin.app>
    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Llibrerias') }}
                            </span>

                            <div class="float-right">

                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
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

                                        <th>Nom</th>
                                        <th>Adreça</th>
                                        <th>Página web</th>

                                        <th> <a href="{{ route('bookstores.create') }}">
                                            <div  class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                <img src="{{asset('img/icons/plus.webp')}}" alt="Afegir nova llibreria" class="add w-2.5 h-2.5">
                                                <p class="">Nou</p>
                                            </div>
                                        </a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookstores as $bookstore)
                                        <tr>
                                            <td>{{  $bookstore['id'] }}</td>

                                            <td>{{ $bookstore['name'] }}</td>
                                            <td>{{ $bookstore['address'] }}</td>
                                            <td><a href="{{ $bookstore['website'] }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $bookstore['website'] }}</a></td>

                                            <td>
                                                <form action="{{ route('bookstores.destroy', $bookstore['id']) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('bookstores.edit', $bookstore['id']) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $bookstores->links() !!} --}}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
