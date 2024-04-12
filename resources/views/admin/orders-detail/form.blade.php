<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="order_id" class="form-label">{{ __('Order Id') }}</label>
            <input type="text" name="order_id" class="form-control @error('order_id') is-invalid @enderror" value="{{ old('order_id', $ordersDetail?->order_id) }}" id="order_id" placeholder="Order Id">
            {!! $errors->first('order_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="product_id" class="form-label">{{ __('Product Id') }}</label>
            <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id', $ordersDetail?->product_id) }}" id="product_id" placeholder="Product Id">
            {!! $errors->first('product_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
            <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $ordersDetail?->quantity) }}" id="quantity" placeholder="Quantity">
            {!! $errors->first('quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price_each" class="form-label">{{ __('Price Each') }}</label>
            <input type="text" name="price_each" class="form-control @error('price_each') is-invalid @enderror" value="{{ old('price_each', $ordersDetail?->price_each) }}" id="price_each" placeholder="Price Each">
            {!! $errors->first('price_each', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>