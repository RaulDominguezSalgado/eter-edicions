@extends('layouts.app')

@section('template_title')
    {{ $ordersDetail->name ?? __('Show') . " " . __('Orders Detail') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Orders Detail</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('orders-details.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Order Id:</strong>
                            {{ $ordersDetail->order_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Product Id:</strong>
                            {{ $ordersDetail->product_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Quantity:</strong>
                            {{ $ordersDetail->quantity }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Price Each:</strong>
                            {{ $ordersDetail->price_each }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
