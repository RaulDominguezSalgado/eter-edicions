<?php
    function getBooks($selected=-1)
    {
        $col_options = '<option selected disabled>Selecciona una opció</option>';
        foreach ($books as $book) {
            if ($book->id == $selected) {
                $col_options .= "<option selected value='$book->id'>" . $book->title . '</option>';
            } else {
                $col_options .= "<option value='$book->id'>" . $book->title . '</option>';
            }
        }
        echo $col_options;
    }
    echo '<select id="getBooks" style="display: none;">';
    getBooks();
?>
<div class="row padding-1 p-1">
    <div class="col-md-12">
        @if ($message = Session::get('error'))
            <div class="alert alert-success m-4">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Data') }}</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                value="{{ old('date', $order['date']) }}" id="date" placeholder="Data">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="dni" class="form-label">{{ __('DNI del client') }}</label>
            <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror"
                value="{{ old('dni', $order['dni']) }}" id="dni" placeholder="DNI del client">
            {!! $errors->first('dni', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="first_name" class="form-label">{{ __('Nom del client') }}</label>
            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                value="{{ old('first_name', $order['first_name']) }}" id="first_name" placeholder="Nom del client">
            {!! $errors->first('first_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="last_name" class="form-label">{{ __('Cognoms del client') }}</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                value="{{ old('last_name', $order['last_name']) }}" id="last_name" placeholder="Cognoms del client">
            {!! $errors->first('last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Correu electrònic del client') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $order['email']) }}" id="email" placeholder="Correu electrònic del client">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="phone_number" class="form-label">{{ __('Número de contacte del client') }}</label>
            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                value="{{ old('phone_number', $order['phone_number']) }}" id="phone_number"
                placeholder="Número de contacte del client">
            {!! $errors->first('phone_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Adreça del client') }}</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                value="{{ old('address', $order['address']) }}" id="address" placeholder="Adreça del client">
            {!! $errors->first('address', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="zip_code" class="form-label">{{ __('Codi postal del client') }}</label>
            <input type="text" name="zip_code" class="form-control @error('zip_code') is-invalid @enderror"
                value="{{ old('zip_code', $order['zip_code']) }}" id="zip_code"
                placeholder="'Codi postal del client'">
            {!! $errors->first('zip_code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="city" class="form-label">{{ __('Ciutat del client') }}</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                value="{{ old('city', $order['city']) }}" id="city" placeholder="Ciutat del client">
            {!! $errors->first('city', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="country" class="form-label">{{ __('País del client') }}</label>
            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror"
                value="{{ old('country', $order['country']) }}" id="country" placeholder="País del client">
            {!! $errors->first('country', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <hr>
    </div>
    <div class="form-group mb-2 mb20">
        <label for="status_id" class="form-label">{{ __('Estat de la comanda') }}</label>
        <select name="status_id" class="form-control @error('status_id') is-invalid @enderror" id="status_id">
            @foreach ($statuses as $status)
                <option value="{{ $status->id }}" @if ($order['status'] == $status->name) selected @endif>
                    {{ $status->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('status_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>
    <div class="form-group mb-2 mb20">
        <label for="payment_method" class="form-label">{{ __('Metode de pagament') }}</label>
        <input type="text" name="payment_method"
            class="form-control @error('payment_method') is-invalid @enderror"
            value="{{ old('payment_method', $order['payment_method']) }}" id="payment_method"
            placeholder="Payment Method">
        {!! $errors->first(
            'payment_method',
            '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
        ) !!}
    </div>
    <div class="form-group mb-2 mb20">
        <label for="reference" class="form-label">{{ __('Referencia') }}</label>
        <input type="text" name="reference" class="form-control @error('reference') is-invalid @enderror"
            value="{{ old('reference', $order['reference']) }}" id="reference" placeholder="Referencia">
        {!! $errors->first('reference', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>
    <div class="form-group mb-2 mb20">
        <label for="tracking_id" class="form-label">{{ __('Codi d\'enviament') }}</label>
        <input type="text" name="tracking_id" class="form-control @error('tracking_id') is-invalid @enderror"
            value="{{ old('tracking_id', $order['tracking_id']) }}" id="tracking_id" placeholder="Codi d'enviament">
        {!! $errors->first('tracking_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>

    <div class="form-group mb-2 mb20">
        <label for="pdf" class="form-label">{{ __('PDF') }}</label>
        <input type="file" accept=".pdf" name="pdf" class="form-control @error('pdf') is-invalid @enderror"
            value="{{ old('pdf', $order['pdf']) }}" id="pdf" placeholder="PDF">
        {!! $errors->first('pdf', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>

    <a id="add_product" class="add-content-button">Afegir llibre</a>
    <div id="products" class="flex flex-wrap">
        <label for="products" class="form-label">{{ __('Productes') }}</label>
        @foreach ($books as $book)
            <div class="product flex items-center mb-4" style="width: 100%;">
                <label for="product_names[]" class="form-label" style="width: 50%">{{ $book->title }} </label>
                <input type="text" hidden name="products[{{ $book->id }}][product_id]"
                    value="{{ $book->id }}">
                <input readonly type="text" name="products[{{ $book->id }}][price_each]"
                    style="width: 25%; border: none;"
                    value="{{ $order['products'][$book->id]['price_each'] ?? ($book->discounted_price ?? $book->pvp) }}"
                    placeholder="Preu">
                <input type="number" name="products[{{ $book->id }}][quantity]" style="width: 25%"
                    value="{{ $order['products'][$book->id]['quantity'] ?? 0 }}" placeholder="Quantitat"
                    min="0" onchange="calculateTotal()">
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <div class="flex items-center mb-4">
            <label for="total" style="width: 100%" class="mr-2">{{ __('Preu total') }}</label>
            <input type="text" name="total" class="form-control @error('total') is-invalid @enderror"
                value="{{ old('total', $order['total'] ?? 0) }}" style="border: none" id="total"
                placeholder="Preu total">
        </div>
        {!! $errors->first('total', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>
    {{-- <script>
        function calculateTotal(product) {
            console.log("Product:", product);
            if (product) {
                var priceInput = product.querySelector('input[name="product_price[]"]');
                var quantityInput = product.querySelector('input[name="product_quantity[]"]');

                if (priceInput && quantityInput) {
                    console.log("Price input:", priceInput);
                    console.log("Quantity input:", quantityInput);
                }
            }
        }
    </script> --}}

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
<script src="{{ asset('js/form/products.js') }}"></script>
