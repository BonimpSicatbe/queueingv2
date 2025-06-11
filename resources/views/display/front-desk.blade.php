{{-- views.display.front-desk --}}
<x-app-layout>
    <div class="grow flex flex-row gap-4 items-center h-full">
        {{-- card container --}}
        <div class="flex flex-col max-w-[20%] w-full h-full gap-4">
            {{-- cards --}}
            @livewire('layouts.display.queue-card', ['label' => 'receiving', 'queueType' => 'receiving', 'color' => 'red'])
            @livewire('layouts.display.queue-card', ['label' => 'compliance', 'queueType' => 'compliance', 'color' => 'blue'])
            @livewire('layouts.display.queue-card', ['label' => 'sena inquiries', 'queueType' => 'sena inquiries', 'color' => 'yellow'])
            @livewire('layouts.display.queue-card', ['label' => 'inquiries / rfa', 'queueType' => 'inquiries', 'color' => 'green'])
        </div>

        {{-- video container --}}
        <div class="grow h-full flex items-center justify-center">
            {{-- video --}}
            <video class="h-full w-auto" src="{{ asset('videos/DOLE Hymn (CARAGA REGION).mp4') }}" autoplay muted
                loop></video>
        </div>
    </div>
</x-app-layout>
