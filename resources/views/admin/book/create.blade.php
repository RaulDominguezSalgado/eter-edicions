<x-layouts.admin.app>
    <div class="container-fluid">
        <div class="row">
            <div class="">
                <div class="flex justify-between items-end py-3">
                    <div>
                        <h2>Afegir nou llibre</h2>
                    </div>
                    <div class="flex flex-col items-end space-y-6">
                        <div><a class="navigation-button font-bold" href="{{ route('books.index') }}">Enrere</a></div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form method="POST" action="{{ route('books.store') }}" role="form" enctype="multipart/form-data">

                @csrf

                <div class="card-body bg-white">
                    <form action="{{ route('books.store') }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @include('admin.book.create-form')
                    </form>
                </div>
        </div>
    </div>
</x-layouts.admin.app>
<script src="/js/book/create.js"></script>
