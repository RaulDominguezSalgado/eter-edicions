<x-layouts.app>
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
                                {{ __('Collaborator') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('collaborators.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Imatge</th>
										<th>Nom</th>
										<th>Cognoms</th>
                                        <th>Llenguatge</th>
										<th>Social Networks</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collaboratorsArray as $collaborator)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											{{-- <td>{{ $collaborator["image"] }}</td> --}}
                                            <td>
                                                <img style="width: 100px; height: auto;" src="{{ asset('img/collab/'. $collaborator["image"]) }}" alt="{{ ($collaborator["image"]." - ") }}">
                                            </td>
											<td>{{ $collaborator["name"] }}</td>
											<td>{{ $collaborator["last_name"] }}</td>
											<td>{{ $collaborator["lang"] }}</td>
											<td>{{ $collaborator["social_networks"] }}</td>

                                            <td>
                                                <form action="{{ route('collaborators.destroy',$collaborator["id"]) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('collaborators.show',$collaborator["id"]) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('collaborators.edit',$collaborator["id"]) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $collaborators->links() !!}
            </div>
        </div>
    </div>
</x-layouts.app>
