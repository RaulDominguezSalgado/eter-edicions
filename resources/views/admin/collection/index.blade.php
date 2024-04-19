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

                            <h2>Gestió de col·leccions</h2>
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
                                        <th>Llenguatge</th>
                                        <th>Nom</th>
                                        <th>Descripció</th>

                                        <th>
                                            <a href="{{ route('collections.create') }}">
                                                <div
                                                    class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                    <img src="{{ asset('img/icons/plus.webp') }}"
                                                        alt="Afegir nou llibre" class="add w-2.5 h-2.5">
                                                    <p class="">Nou</p>
                                                </div>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collectionsArray as $collection)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $collection['lang'] }}</td>
                                            <td>{{ $collection['name'] }}</td>
                                            <td>{{ $collection['description'] }}</td>

                                            <td>
                                                <form action="{{ route('collections.destroy', $collection['id']) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('collections.show', $collection['id']) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('collections.edit', $collection['id']) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $collections->links() !!}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
