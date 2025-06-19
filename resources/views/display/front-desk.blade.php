{{-- views.display.front-desk --}}
<x-app-layout>
    <div class="grow flex flex-row gap-4 items-center h-full">
        {{-- card container --}}
        <div wire:poll.1s class="flex flex-col max-w-[20%] w-full h-full gap-4">
            {{-- cards --}}
            @livewire('display.queue-card', ['label' => 'receiving', 'queueType' => 'receiving', 'color' => 'red'])
            @livewire('display.queue-card', ['label' => 'compliance', 'queueType' => 'compliance', 'color' => 'blue'])
            @livewire('display.queue-card', ['label' => 'sena inquiries', 'queueType' => 'sena_inquiries', 'color' => 'yellow'])
            @livewire('display.queue-card', ['label' => 'inquiries / rfa', 'queueType' => 'inquiries_rfa', 'color' => 'green'])
        </div>

        {{-- video container --}}
        <div class="grow h-full flex items-center justify-center">
            {{-- video --}}
            <video class="h-full w-auto" src="{{ asset('videos/DOLE Hymn (CARAGA REGION).mp4') }}" autoplay muted
                loop></video>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('call-queue', ({
                data
            }) => {
                const digits = String(data.queue_number).split('').join('. ');
                const message = new SpeechSynthesisUtterance(
                    `Calling. ${data.label} Number. ${digits}. Please proceed to the front desk.`
                );
                message.lang = 'en-US';
                message.voice = speechSynthesis.getVoices().find(voice => voice.name ===
                    'Google US English');
                window.speechSynthesis.speak(message);
            });
        });
    </script>
</x-app-layout>
