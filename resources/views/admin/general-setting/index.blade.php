<x-layouts.admin.app>
    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}

    <div class="">
        <div class="mb-2">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <h2>Configuració general de la pàgina</h2>

            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead">
                        <tr>
                            <th>No</th>

                            <th>Nom</th>
                            <th>Categoria</th>
                            <th>Contingut</th>

                            <th>
                                {{-- <a href="{{ route('general-settings.create') }}">
                                                <div
                                                    class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                    <img src="{{ asset('img/icons/plus.webp') }}"
                                                        alt="Afegir nou llibre" class="add w-2.5 h-2.5">
                                                    <p class="">Nou</p>
                                                </div>
                                            </a> --}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($settingsArray as $setting)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>{{ $setting['key'] }}</td>
                                <td>{{ $setting['category'] }}</td>
                                <td>
                                    @if($setting['key'] == 'logo')
                                        <img src="{{asset("img/logo/xs/".$setting['value'])}}" alt="">
                                    @else
                                    {{ $setting['value'] }}
                                    @endif
                                </td>

                                <td class="min-w-fit">
                                    <form action="{{ route('general-settings.destroy', $setting['id']) }}" method="POST" class="flex space-x-4">
                                        {{-- <a class="btn btn-sm btn-primary "
                                                        href="{{ route('general-settings.show', $setting['id']) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a> --}}
                                        <a class="btn btn-sm btn-success min-w-fit"
                                            href="{{ route('general-settings.edit', $setting['id']) }}"><i
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
    {!! $settings->links() !!}
</x-layouts.admin.app>
