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

                            <h2>Gestió d'usuaris</h2>

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

										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Role</th>

                                        <th><a href="{{ route('users.create') }}">
                                            <div  class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                <img src="{{asset('img/icons/plus.webp')}}" alt="Afegir nou llibre" class="add w-2.5 h-2.5">
                                                <p class="">Nou</p>
                                            </div>
                                        </a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usersArray as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $user['name'] }}</td>
											<td>{{ $user['email'] }}</td>
											<td>{{ $user['phone'] }}</td>
											<td>{{ $user['role'] }}</td>

                                            <td>
                                                <form action="{{ route('users.destroy',$user['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user['id']) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
