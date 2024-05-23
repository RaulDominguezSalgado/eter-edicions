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
                                            <div  class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                <img src="{{asset('img/icons/plus.webp')}}" alt="Afegir nou llibre" class="add w-2.5 h-2.5">
                                                <p class="">Nou</p>
                                            </div>
                                        </a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b-2 border-dark">
                                        <form action="{{ route('collaborators.index.post') }}" method="POST">
                                            @csrf
                                            @method("POST")
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
                                                    <input type="text" name="name" id="name" placeholder="Nom" value="{{ $old["name"] ?? "" }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    
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
                                            {{-- <td>{{ $collaborator["image"] }}</td> --}}
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
                                                <form action="{{ route('collaborators.destroy', $collaborator['id']) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('collaborators.show', $collaborator['id']) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('collaborators.edit', $collaborator['id']) }}"><i
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
                {!! $collaborators->links() !!}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
