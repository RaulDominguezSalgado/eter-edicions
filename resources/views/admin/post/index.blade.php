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
                                    <tr class="border-b-2 border-dark">
                                        <form action="{{ route('posts.index.post') }}" method="POST">
                                            @csrf
                                            @method("POST")
                                            <td>
                                                <div class="flex">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="title" id="title" placeholder="Títol" value="{{ $old["title"] ?? "" }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="description" id="description" placeholder="Descripció" value="{{ $old["description"] ?? "" }}">
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
                                                <div class="flex">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="content" id="content" placeholder="Contingut" value="{{ $old["content"] ?? "" }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')"  name="publication_date-min" id="publication_date-min" placeholder="min" value="{{ $old["publication_date-min"] ?? "" }}">
                                                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')"  name="publication_date-max" id="publication_date-max" placeholder="max" value="{{ $old["publication_date-max"] ?? "" }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="published_by" id="published_by" placeholder="Publicat per" value="{{ $old["published_by"] ?? "" }}">
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
                                                    <a class="btn btn-sm btn-primary " href="{{ route('posts.show',$post['id']) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Vista prèvia') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('posts.edit',$post['id']) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="document.getElementById('confirmDelete-{{ $post['id'] }}').classList.remove('hidden');">
                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Esborrar') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('components.layouts.admin.delete-confirmation-modal', ['id' => $post['id'], 'message' =>  __('Segur que voleu suprimir aquest recurs?'), 'action' => route('posts.destroy', $post['id'])])
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
<script src="{{ asset('js/form/alert.js') }}"></script>
