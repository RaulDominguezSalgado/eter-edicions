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

                            <h2>Gestió d'articles i activitats</h2>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="bg-light">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Títol</th>
										{{-- <th>Autor</th>
										<th>Traductor</th> --}}
										<th colspan="2">Descripció</th>
										{{-- <th>Data</th>
                                        <th>Ubicació</th> --}}
										<th colspan="2">Imatge</th>
										<th>Contingut</th>
										<th>Data de publicació</th>
										<th>Publicat per</th>

                                        <th><a href="{{ route('posts.create') }}">
                                            <div  class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                <img src="{{asset('img/icons/plus.webp')}}" alt="Afegir nou llibre" class="add w-2.5 h-2.5">
                                                <p class="">Nou</p>
                                            </div>
                                        </a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postsArray as $post)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $post['title'] }}</td>
											{{-- <td>{{ $post['author_id'] }}</td>
											<td>{{ $post['translator_id'] }}</td> --}}
											<td colspan="2">{{ $post['description'] }}</td>
											{{-- <td>{{ $post['date'] }} {{ substr($post['time'], 0, 6) }}</td>
                                            <td>{{ $post['location'] }}</td> --}}
											<td colspan="2">
                                                {{-- {{ $post['image'] }} --}}
                                                <img style="width: 100px; height: auto;" src="{{ asset('img/posts/covers/' . $post['image']) }}" alt="{{ ($post['image']." - ") }}">
                                            </td>
											{{-- <td>{{ $post['content'] }}</td> --}}
                                            <td>{!! substr($post['content'], 0, 255) !!}@if(strlen($post['content']) > 255)... <a href="{{ route('posts.show',$post['id']) }}" class="underline text-sm">Veure més</a>@endif</td>

											<td>{{ $post['publication_date'] }}</td>
											<td>{{ $post['published_by'] }}</td>

                                            <td>
                                                <form action="{{ route('posts.destroy',$post['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('posts.edit',$post['id']) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
