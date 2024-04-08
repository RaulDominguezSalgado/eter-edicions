@extends('layouts.app')

@section('template_title')
    Collaborators Translation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Collaborators Translation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('collaborators-translations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Collaborator Id</th>
										<th>Lang</th>
										<th>Name</th>
										<th>Last Name</th>
										<th>Biography</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collaboratorsTranslations as $collaboratorsTranslation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $collaboratorsTranslation->collaborator_id }}</td>
											<td>{{ $collaboratorsTranslation->lang }}</td>
											<td>{{ $collaboratorsTranslation->name }}</td>
											<td>{{ $collaboratorsTranslation->last_name }}</td>
											<td>{{ $collaboratorsTranslation->biography }}</td>

                                            <td>
                                                <form action="{{ route('collaborators-translations.destroy',$collaboratorsTranslation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('collaborators-translations.show',$collaboratorsTranslation->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('collaborators-translations.edit',$collaboratorsTranslation->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $collaboratorsTranslations->links() !!}
            </div>
        </div>
    </div>
@endsection
