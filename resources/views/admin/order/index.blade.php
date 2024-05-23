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
                                    <tr class="border-b-2 border-dark">
                                        <form action="{{ route('orders.index.post') }}" method="POST">
                                            @csrf
                                            @method("POST")
                                            <td>
                                                <div class="flex">
                                                    
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="reference" id="reference" placeholder="Referència" value="{{ $old["reference"] ?? "" }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="address" id="address" placeholder="Entrega" value="{{ $old["address"] ?? "" }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="client" id="client" placeholder="Client" value="{{ $old["client"] ?? "" }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="total-min" id="total-min" placeholder="min" value="{{ $old["total-min"] ?? "" }}">
                                                    <input type="text" name="total-max" id="total-max" placeholder="max" value="{{ $old["total-max"] ?? "" }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <select name="payment_method" id="payment_method">
                                                        <option value="" selected disabled>---</option>
                                                        @foreach($payment_methods as $method)
                                                            <option @if(isset($old["payment_method"]) && $old["payment_method"] == $method) selected @endif value="{{ $method }}">{{ $method }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <select name="status_id" id="status_id">
                                                        <option value="" selected disabled>---</option>
                                                        @foreach($status_list as $status)
                                                            <option @if(isset($old["status_id"]) && $old["status_id"] == $status["id"]) selected @endif value="{{ $status['id'] }}">{{ $status['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="date-min" id="date-min" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="min" value="{{ $old["date-min"] ?? "" }}">
                                                    <input type="text" name="date-max" id="date-max" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="max" value="{{ $old["date-max"] ?? "" }}">
                                                </div>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="submit" value="Cerca" name="search[search]">
                                                    <input type="submit" value="Restaura" name="search[clear]">
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                    @foreach ($orders as $order)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}

                                            <td>{{ $order['id'] }}</td>
                                            <td>{{ $order['reference'] }}</td>
                                            <td>{{ $order['address'] }}</td>
                                            <td>{{ $order['first_name'] . ' ' . $order['last_name'] }}</td>
                                            <td>{{ $order['total'] }}</td>
                                            <td>{{ $order['payment_method'] }}</td>
                                            <td>{{ $order['status'] }}</td>
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
