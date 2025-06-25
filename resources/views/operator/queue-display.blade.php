{{-- views.display.queue-display --}}
<x-app-layout>
    <div class="grow flex flex-row gap-4 items-center h-full overflow-hidden">
        {{-- card container --}}
        <div wire:poll.1s class="flex flex-col grow min-w-[20%] h-full overflow-hidden gap-4">
            {{-- cards --}}
            @livewire('operator.queue-display')
        </div>

        {{-- video container --}}
        <div class="min-w-fit h-full flex items-center justify-center">
            {{-- video --}}
            <video class="h-full w-auto" src="{{ asset('videos/DOLE Hymn (CARAGA REGION).mp4') }}" autoplay muted
                loop></video>
        </div>
    </div>
</x-app-layout>
