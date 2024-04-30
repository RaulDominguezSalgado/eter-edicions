<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/agency.css') }}">

    <main class="body mb-20">
        <div class="flex flex-col items-center space-y-5">
            <div class="flex flex-col items-center justify-center space-y-5 ">
                <h2>{{__('general.agency')}}</h2>
                <div class="w-full">
                    <p class="text-justify">{{$page['contents']['p1']}}</p>
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
