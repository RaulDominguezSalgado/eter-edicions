<x-layouts.admin.app>
    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Bookstore</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('bookstores.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.bookstore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.admin.app>
