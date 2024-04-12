@extends('layouts.app')

@section('template_title')
    Orders Detail
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Orders Detail') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('orders-details.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Order Id</th>
										<th>Product Id</th>
										<th>Quantity</th>
										<th>Price Each</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersDetails as $ordersDetail)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ordersDetail->order_id }}</td>
											<td>{{ $ordersDetail->product_id }}</td>
											<td>{{ $ordersDetail->quantity }}</td>
											<td>{{ $ordersDetail->price_each }}</td>

                                            <td>
                                                <form action="{{ route('orders-details.destroy',$ordersDetail->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('orders-details.show',$ordersDetail->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('orders-details.edit',$ordersDetail->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $ordersDetails->links() !!}
            </div>
        </div>
    </div>
@endsection
