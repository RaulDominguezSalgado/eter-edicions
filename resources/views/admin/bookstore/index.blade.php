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
                                {{ __('Bookstore') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bookstores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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

										<th>Name</th>
										<th>Address</th>
										<th>Website</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookstores as $bookstore)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $bookstore->name }}</td>
											<td>{{ $bookstore->address }}</td>
											<td><a href="{{$bookstore->website}}" target="_blank" rel="noopener noreferrer">{{$bookstore->website}}</a></td>

                                            <td>
                                                <form action="{{ route('bookstores.destroy',$bookstore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bookstores.show',$bookstore->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bookstores.edit',$bookstore->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bookstores->links() !!}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
