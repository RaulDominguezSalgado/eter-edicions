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

                            <h2>Gestió de comandes</h2>

                            <div class="float-right">

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
                                        <th>ID</th>
                                        <th>Referència</th>
                                        <th>Entrega</th>
                                        <th>Client</th>
                                        <th>Total</th>
                                        <th>Pagament</th>
                                        <th>Estat</th>
                                        <th>Data</th>
                                        <th>PDF</th>

                                        <th> <a href="{{ route('orders.create') }}">
                                                <div
                                                    class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                    <img src="{{ asset('img/icons/plus.webp') }}"
                                                        alt="Afegir nou llibre" class="add w-2.5 h-2.5">
                                                    <p class="">Nou</p>
                                                </div>
                                            </a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}

                                            <td>{{ $order['id'] }}</td>
                                            <td>{{ $order['reference'] }}</td>
                                            <td>{{ $order['address'] }}</td>
                                            <td>{{ $order['first_name'] . ' ' . $order['last_name'] }}</td>
                                            <td>{{ $order['total'] }}</td>
                                            <td>{{ $order['payment_method'] }}</td>
                                            <td><div class="w-2/3 border p-2 rounded text-light" style="background-color: {{ $order['status_color'] }}">{{ $order['status'] }}</div></td> {{-- {{ $order['status_color'] }} --}}
                                            <td>{{ $order['date'] }}</td>
                                            <td>{{ $order['pdf'] }}</td>
                                            <td>
                                                <form action="{{ route('orders.destroy', $order['id']) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('orders.show', $order['id']) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('orders.edit', $order['id']) }}"><i
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
                {!! $orderspag->links() !!}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
