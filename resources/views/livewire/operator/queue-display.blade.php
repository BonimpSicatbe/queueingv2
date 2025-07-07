<div class="flex flex-col gap-8 w-full h-full">

    <div class="flex flex-col gap-4 h-full w-full">
        {{-- top --}}
        <div class="flex flex-col gap-8 items-center justify-center w-full bg-white rounded-lg p-4">
            <div class="text-lg font-bold uppercase">in queue</div>

            <div class="flex flex-col gap-2 text-center">
                <div class="text-lg font-bold uppercase">{{ $queue->queue_type ?? 'queue' }} number</div>
                <div class="text-7xl uppercase font-bold">{{ str_pad($queue->id ?? 0000, 4, '0', STR_PAD_LEFT) }}</div>
            </div>
        </div>

        {{-- bottom --}}
        <button type="button" wire:click='callNext()'
            class="btn btn-success w-full rounded-lg p-2 uppercase font-bold text-lg text-center">next in queue</button>

        <div wire:poll class="flex flex-col gap-2">
            @forelse ($waitList as $wait)
                <div class="flex flex-col p-2 w-full text-center uppercase rounded-lg bg-white">
                    <div class="text-lg font-bold">{{ $wait->queue_type ?? 'queue' }} number</div>
                    <div class="text-5xl font-bold">{{ str_pad($wait->id, 4, '0', STR_PAD_LEFT) }}</div>
                </div>
            @empty
                <div class="w-full bg-white rounded-lg p-2 uppercase font-bold text-lg text-center">-</div>
            @endforelse
        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('call-next', ({data}) => {
            console.log('Calling next queue:', data);
            const queueNumber = String(data.queue_number).padStart(4, '0').split('').join('. ');
            const message = new SpeechSynthesisUtterance(
                ` . Calling. ${data.queue_type} Number.. ${queueNumber}. Please proceed to the front desk.`
            );

            message.lang = 'en-US';
            message.rate = 1.2;
            message.pitch = 1.0;

            // Use the default female voice if available
            const voices = window.speechSynthesis.getVoices();
            const femaleVoice = voices.find(voice => voice.lang === 'en-US' && voice.gender === 'female')
                || voices.find(voice => voice.lang === 'en-US' && voice.name.toLowerCase().includes('female'))
                || voices.find(voice => voice.lang === 'en-US' && voice.name.toLowerCase().includes('woman'))
                || voices.find(voice => voice.lang === 'en-US' && voice.name.toLowerCase().includes('girl'))
                || voices.find(voice => voice.lang === 'en-US');
            if (femaleVoice) {
                message.voice = femaleVoice;
            }
            window.speechSynthesis.speak(message);
            })
        });
    </script>
</div>
