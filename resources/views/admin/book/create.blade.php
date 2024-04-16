<x-layouts.admin.app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <a href="{{ route('books.index') }}">Torna a l'index</a>
                                <h1>Publica un nou llibre</h1>
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('books.store') }}" role="form" enctype="multipart/form-data">

                        @csrf

                        @include('admin.book.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.app>
