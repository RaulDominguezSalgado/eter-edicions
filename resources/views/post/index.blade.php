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
                                {{ __('Post') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Títol</th>
										<th>Autor</th>
										<th>Traductor</th>
										<th>Descripció</th>
										<th>Data</th>
                                        <th>Ubicació</th>
										<th>Imatge</th>
										<th>Contingut</th>
										<th>Data de publicació</th>
										<th>Publicat per</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postsArray as $post)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $post['title'] }}</td>
											<td>{{ $post['author_id'] }}</td>
											<td>{{ $post['translator_id'] }}</td>
											<td>{{ $post['description'] }}</td>
											<td>{{ $post['date'] }}</td>
                                            <td>{{ $post['location'] }}</td>
											<td>
                                                {{-- {{ $post['image'] }} --}}
                                                <img style="width: 100px; height: auto;" src="{{ asset('img/posts/' . $post['image']) }}" alt="{{ ($post['image']." - ") }}">
                                            </td>
											<td>{{ $post['content'] }}</td>
											<td>{{ $post['publication_date'] }}</td>
											<td>{{ $post['published_by'] }}</td>

                                            <td>
                                                <form action="{{ route('posts.destroy',$post['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('posts.show',$post['id']) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('posts.edit',$post['id']) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
