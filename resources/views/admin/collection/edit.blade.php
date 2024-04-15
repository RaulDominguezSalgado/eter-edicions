<x-layouts.admin.app>
    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Collection</span>

                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('collections.index') }}"> {{ __('Back') }}</a>
                        </div>

                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('collections.update', $collection['id']) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('collection.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.admin.app>
