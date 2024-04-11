<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Date') }}</label>
            <input type="text" name="date" class="form-control @error('date') is-invalid @enderror"
                value="{{ old('date', $order'[date']) }}" id="date" placeholder="Date">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div id="products">
            <label for="products" class="form-label">{{ __('Productes') }}</label>
            <button type="button" id="add_product" class="btn btn-primary">+</button>

            @if (isset($collaborator['products']))
                @foreach ($collaborator['products'] as $social => $url)
                    <div class="product">
                        <input type="text" name="product_name[]" value="{{ $social }}"
                            placeholder="Nom">
                        <input type="text" name="product_price[]" value="{{ $social }}"
                        placeholder="Preu">
                        <input type="text" name="product_quantity[]" value="{{ $url }}"
                            placeholder="Quantitat">
                    </div>
                @endforeach
            @endif
        </div>
        {{-- <div class="form-group mb-2 mb20">
            <label for="id" class="form-label">{{ __('ID') }}</label>
            <input type="text" name="id" class="form-control @error('id') is-invalid @enderror" value="{{ old('id', $order?->id) }}" id="id" placeholder="ID">
            {!! $errors->first('id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="reference" class="form-label">{{ __('Reference') }}</label>
            <input type="text" name="reference" class="form-control @error('reference') is-invalid @enderror" value="{{ old('reference', $order?->reference) }}" id="reference" placeholder="Reference">
            {!! $errors->first('reference', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
        <div class="card card-default">
            <hr>
            <div class="card-header">
                <span class="card-title">{{ __('Client') }}:</span>
            </div>
            <div class="form-group mb-2 mb20">
                <label for="client_dni" class="form-label">{{ __('Client DNI') }}</label>
                <input type="text" name="client_dni" class="form-control @error('client_dni') is-invalid @enderror"
                    value="{{ old('client_dni', $order['client_dni']) }}" id="client_dni" placeholder="Client DNI">
                {!! $errors->first('client_dni', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>

            <div class="form-group mb-2 mb20">
                <label for="client_first_name" class="form-label">{{ __('Client First Name') }}</label>
                <input type="text" name="client_first_name"
                    class="form-control @error('client_first_name') is-invalid @enderror"
                    value="{{ old('client_first_name', $order['client_first_name']) }}" id="client_first_name"
                    placeholder="Client First Name">
                {!! $errors->first(
                    'client_first_name',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>

            <div class="form-group mb-2 mb20">
                <label for="client_last_name" class="form-label">{{ __('Client Last Name') }}</label>
                <input type="text" name="client_last_name"
                    class="form-control @error('client_last_name') is-invalid @enderror"
                    value="{{ old('client_last_name', $order['client_last_name']) }}" id="client_last_name"
                    placeholder="Client Last Name">
                {!! $errors->first(
                    'client_last_name',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>

            <div class="form-group mb-2 mb20">
                <label for="client_email" class="form-label">{{ __('Client Email') }}</label>
                <input type="email" name="client_email"
                    class="form-control @error('client_email') is-invalid @enderror"
                    value="{{ old('client_email', $order['client_email']) }}" id="client_email"
                    placeholder="Client Email">
                {!! $errors->first('client_email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>

            <div class="form-group mb-2 mb20">
                <label for="client_phone_number" class="form-label">{{ __('Client Phone Number') }}</label>
                <input type="text" name="client_phone_number"
                    class="form-control @error('client_phone_number') is-invalid @enderror"
                    value="{{ old('client_phone_number', $order['client_phone_number']) }}" id="client_phone_number"
                    placeholder="Client Phone Number">
                {!! $errors->first(
                    'client_phone_number',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>

            <div class="form-group mb-2 mb20">
                <label for="client_address" class="form-label">{{ __('Client Address') }}</label>
                <input type="text" name="client_address"
                    class="form-control @error('client_address') is-invalid @enderror"
                    value="{{ old('client_address', $order['client_address']) }}" id="client_address"
                    placeholder="Client Address">
                {!! $errors->first(
                    'client_address',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>

            <div class="form-group mb-2 mb20">
                <label for="client_zip_code" class="form-label">{{ __('Client Zip Code') }}</label>
                <input type="text" name="client_zip_code"
                    class="form-control @error('client_zip_code') is-invalid @enderror"
                    value="{{ old('client_zip_code', $order['client_zip_code']) }}" id="client_zip_code"
                    placeholder="Client Zip Code">
                {!! $errors->first(
                    'client_zip_code',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>

            <div class="form-group mb-2 mb20">
                <label for="client_city" class="form-label">{{ __('Client City') }}</label>
                <input type="text" name="client_city" class="form-control @error('client_city') is-invalid @enderror"
                    value="{{ old('client_city', $order['client_city']) }}" id="client_city" placeholder="Client City">
                {!! $errors->first('client_city', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>

            <div class="form-group mb-2 mb20">
                <label for="client_country" class="form-label">{{ __('Client Country') }}</label>
                <input type="text" name="client_country"
                    class="form-control @error('client_country') is-invalid @enderror"
                    value="{{ old('client_country', $order['client_country']) }}" id="client_country"
                    placeholder="Client Country">
                {!! $errors->first(
                    'client_country',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>
            <hr>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="order_status" class="form-label">{{ __('Order Status') }}</label>
            <input type="text" name="order_status" class="form-control @error('order_status') is-invalid @enderror"
                value="{{ old('order_status', $order['total_price']) }}" id="order_status" placeholder="Total Price">
            {!! $errors->first('order_status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="payment_method" class="form-label">{{ __('Payment Method') }}</label>
            <input type="text" name="payment_method"
                class="form-control @error('payment_method') is-invalid @enderror"
                value="{{ old('payment_method', $order['payment_method']) }}" id="payment_method"
                placeholder="Payment Method">
            {!! $errors->first(
                'payment_method',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        {{-- <div class="form-group mb-2 mb20">
            <label for="order_pdf" class="form-label">{{ __('Order PDF') }}</label>
            <input type="text" name="order_pdf" class="form-control @error('order_pdf') is-invalid @enderror" value="{{ old('order_pdf', $order?->order_pdf) }}" id="order_pdf" placeholder="Order PDF">
            {!! $errors->first('order_pdf', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<script src="{{ asset('js/form/products.js') }}"></script>
