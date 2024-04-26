<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/agency.css') }}">

    <main class="body mb-20">
        <div class="flex flex-col items-center space-y-5">
            <div class="flex flex-col items-center justify-center space-y-5 ">
                <h2>Agència</h2>
                <div class="w-full">
                    <p class="text-justify">Sed sollicitudin libero eu lacus sodales ultricies molestie ut justo.  Nunc aliquet maximus est, sed sodales lacus accumsan in. Curabitur ut  risus sem. Fusce sit amet est mauris. Donec malesuada velit nec  venenatis rhoncus. Phasellus interdum, quam eget blandit interdum, velit  risus vulputate mauris, quis iaculis neque nisi sed turpis. In eget  nisi a nibh efficitur hendrerit a vitae ligula. Ut a nibh placerat,  iaculis urna a, imperdiet massa. Integer non mauris rhoncus, mattis.</p>
                </div>
                <div class="w-full flex flex-wrap space-x-24" id="collaborators">
                    @foreach ($collaborators as $i => $collaborator)
                        <div class="collaborator flex flex-col items-center ">
                            <div class="cover mb-2">
                                <a href="{{ route("collaborator-detail.{$locale}", $collaborator['id']) }}">
                                    <img src="{{ asset('img/collab/thumbnails/' . $collaborator['image']) }}"
                                        alt="{{ $collaborator['first_name'] }} {{ $collaborator['last_name'] }}"
                                        style="height: 19.7em">
                                </a>
                            </div>
                            <div id="author-info-{{ $collaborator['slug'] }}"
                                class="flex flex-col items-center space-y-2">
                                <div class="book-title w-fit h-12 flex justify-center items-center text-center">
                                    {{ $collaborator['first_name'] }} {{ $collaborator['last_name'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

</x-layouts.app>
