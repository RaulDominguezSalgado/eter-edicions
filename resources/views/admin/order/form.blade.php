<?php
function getBooks($books, $selected = -1, $bookSelected = null, $line = -1)
{
    //
    $col_options = '';
    //'<select hidden id="getBooks" ><option selected disabled>Selecciona una opció</option>';

    if ($bookSelected != null && $selected != -1) {
        $col_options .= "<div class='flex space-x-2 items-end'>";
        $col_options .= '<div class="w-1/3"><label for="products[{{$line}}][id]">Producte</label><input disabled type="text" name="products[' . $line . '][title]" value="' . $bookSelected['title'] . ' (' . $bookSelected['pvp'] . '€)" placeholder="Producte" ></div>';
        $col_options .= '<div><label for="products[{{$line}}][pvp]">Preu</label><input readonly type="number" step="0.01" name="products[' . $line . '][pvp]" value="' . $bookSelected['pvp'] . '" placeholder="Quantitat" min="0"></div>';
        $col_options .= '<div><label for="products[{{$line}}][quantity]">Quantitat</label><input type="number" name="products[' . $line . '][quantity]" value="' . $bookSelected['quantity'] . '" placeholder="Preu personalitzat" ></div>';
        $col_options .= "<input hidden type='number' name='products[" . $line . "][id]'  value='" . $bookSelected['id'] . "' placeholder='id' min='0'>";
        $col_options .= "<div class='flex'><button type='button' class='remove-content-button' onclick='removeParentNode(this.parentNode)'>Eliminar</button></div>";
        $col_options .= '</div>';
    } else {
        $col_options = '<option selected disabled>Selecciona una opció</option>';
        foreach ($books as $book) {
            if ($book['id'] == $selected) {
                $col_options .= "<option selected value='" . $book['id'] . "'>" . $book['title'] . ' (' . $book['pvp'] . '€)' . '</option>';
                //$col_options .= "<option selected  value=\"{$book['id']}\">" . $book['title'] . ' (' . $book['pvp'] . '€)' . '</option>';
            } else {
                $col_options .= "<option value='" . $book['id'] . "'>" . $book['title'] . ' (' . $book['pvp'] . '€)' . '</option>';
                //$col_options .= "<option value=\"{$book['id']}\">" . $book['title'] . ' (' . $book['pvp'] . '€)' . '</option>';
            }
        }
    }
    echo $col_options;
}
echo '<select style="display: none;" name"products[0][id]" id="getBooks" >';
getBooks($books);
echo '</select>';
?>


<div class="row padding-1 p-1">
    <div class="col-md-12">
        @if (session('success'))
            {{-- <div class="alert alert-danger">{{ session('error') }}</div> --}}
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('success') }}</strong>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" onclick="removeParentDiv(this.parentNode)">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">No s'han pogut guardar les dades de la comanda.</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-systemerror" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" onclick="removeParentDiv(this.parentNode)">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif


        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">No s'han pogut guardar les dades de la comanda. Consulta</strong>
                {{-- <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> --}}
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-systemerror" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" onclick="removeParentDiv(this.parentNode)">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
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

        <div class="form-group mb-2 mb20 ">
            <label for="email" class="form-label">{{ __('Correu electrònic del client') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $order['email']) }}" id="email" placeholder="Correu electrònic del client">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20 ">
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
            <label for="apartment" class="form-label">{{ __('Apartament del client') }}</label>
            <input type="text" name="apartment" class="form-control @error('apartment') is-invalid @enderror"
                value="{{ old('apartment', $order['apartment']) }}" id="apartment" placeholder="Apartament del client">
            {!! $errors->first('apartment', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20 ">
            <label for="locality" class="form-label">{{ __('Localitat del client') }}</label>
            <input type="text" name="locality" class="form-control @error('locality') is-invalid @enderror"
                value="{{ old('locality', $order['locality']) }}" id="locality" placeholder="Localitat del client">
            {!! $errors->first('locality', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20 ">
            <label for="province" class="form-label">{{ __('Província del client') }}</label>
            <input type="text" name="province" class="form-control @error('province') is-invalid @enderror"
                value="{{ old('province', $order['province']) }}" id="province" placeholder="Província del client">
            {!! $errors->first('province', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="country" class="form-label">{{ __('País del client') }}</label>
            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror"
                value="{{ old('country', $order['country']) }}" id="country" placeholder="País del client">
            {!! $errors->first('country', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="zip_code" class="form-label">{{ __('Codi postal del client') }}</label>
            <input type="text" name="zip_code" class="form-control @error('zip_code') is-invalid @enderror"
                value="{{ old('zip_code', $order['zip_code']) }}" id="zip_code"
                placeholder="Codi postal del client">
            {!! $errors->first('zip_code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <hr>
    </div>
    <div class="form-group mb-2 mb20">
        <label for="status_id" class="form-label">{{ __('Estat de la comanda') }}</label>
        <select name="status_id" class="form-control @error('status_id') is-invalid @enderror" id="status_id">
            <option selected disabled>Selecciona una opció</option>
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
            placeholder="Metode de pagament">
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
            value="{{ old('tracking_id') ?? $order['tracking_id'] }}" id="tracking_id" placeholder="Codi d'enviament">
        {!! $errors->first('tracking_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>

    <div class="form-group mb-2 mb20">
        <label for="pdf" class="form-label">{{ __('PDF') }}</label>
        <input type="file" accept=".pdf" name="pdf" class="form-control @error('pdf') is-invalid @enderror"
            value="{{ old('pdf', $order['pdf']) }}" id="pdf" placeholder="PDF">
        {!! $errors->first('pdf', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>
    <div id="products" class="space-y-4">
        @if (isset($order['products']))
            <?php $line = 0; ?>
            @foreach ($order['products'] as $book)
                <div>
                    {{-- <label for="products{{ $book['id'] }}">Llibre {{ $line+1 }}</label> --}}
                    <?php getBooks($books, $book['id'], $book, $line); ?>
                    {{-- <a class="remove-content-button">Eliminar</a> --}}
                </div>
                <?php $line++; ?>
            @endforeach
        @endif
        <a id="add_product" class="add-content-button">Afegir llibre</a>
        {!! $errors->first('products', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>

    {{-- <div id="products" class="flex flex-wrap">
        <label for="products" class="form-label">{{ __('Productes') }}</label>
        @foreach ($books as $book)
            <div class="product flex items-center mb-4" style="width: 100%;">
                <label for="product_names[]" class="form-label" style="width: 50%">{{ $book->title }} </label>
                <input type="text" hidden name="products[{{ $book->id }}][id]" value="{{ $book->id }}">
                <input readonly type="text" name="products[{{ $book->id }}][pvp]"
                    style="width: 25%; border: none;"
                    value="{{ $order['products'][$book->id]['pvp'] ?? ($book->discounted_price ?? $book->pvp) }}"
                    placeholder="Preu">
                <input type="number" name="products[{{ $book->id }}][quantity]" style="width: 25%"
                    value="{{ $order['products'][$book->id]['quantity'] ?? 0 }}" placeholder="Quantitat"
                    min="0">
            </div>
        @endforeach
    </div> --}}
    @if (isset($order['total']))
        <div class="form-group">
        @else
            <div class="form-group" hidden>
    @endif

    <div class="flex items-center mb-4">
        <label for="total" style="width: 100%" class="mr-2">{{ __('Preu total') }}</label>
        <input readonly type="text" name="total" class="form-control @error('total') is-invalid @enderror"
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
