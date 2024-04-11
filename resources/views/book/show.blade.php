<x-layouts.app>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h1 class="card-title">{{ $book['title'] }}</h1>
                            <img style="width: 450px;" src="{{ asset('img/book/'.$book['image']) }}" alt="">
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('catalogo') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="form-group mb-2 mb20">
                            <strong>Isbn:</strong>
                            {{ $book['isbn'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Publisher:</strong>
                            {{ $book['publisher'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Image:</strong>
                            {{ $book['image'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Pvp:</strong>
                            {{ $book['pvp'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Iva:</strong>
                            {{ $book['iva'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Discounted Price:</strong>
                            {{ $book['discounted_price'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Stock:</strong>
                            {{ $book['stock'] ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>