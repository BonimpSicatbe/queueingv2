@props([
    'color' => null,
])
<div class="flex flex-col grow rounded-lg overflow-hidden bg-white">
    {{-- label --}}
    <div class="w-full text-center font-bold uppercase py-1 text-2xl {{ $color }}">{{ $label }}
    </div>

    {{-- number --}}
    <div class="flex flex-row justify-evenly w-full h-full">
        <div class="flex flex-col justify-center gap-4 h-full w-full">
            <div class="text-xl font-bold uppercase text-center w-full">in queue</div>
            <div class="w-full text-center text-7xl font-bold flex items-center justify-center">
                {{ $queueNumber ?? 0 }}
            </div>
        </div>
        <div class="flex flex-col justify-center gap-4 h-full w-full">
            <div class="text-xl font-bold uppercase text-center w-full">next in queue</div>
            <div class="w-full text-center text-7xl font-bold flex items-center justify-center">
                @if ($queueNumber + 1 > $queueNumber - ($queueNumber % 1000) + 15)
                    {{ $queueNumber - ($queueNumber % 1000) + 1 }}
                @else
                    {{ $queueNumber + 1 }}
                @endif
            </div>
        </div>
    </div>

    {{-- controls --}}
    <div class="flex flex-row gap-4 justify-evenly py-2 {{ $color }}">
        <button wire:click='prev' type="button" class="btn btn-ghost btn-square text-2xl">
            <i class="fa-solid fa-minus"></i>
        </button>
        <button wire:click='play' type="button" class="btn btn-ghost btn-square text-2xl">
            <i class="fa-solid fa-play"></i>
        </button>
        <button wire:click='next' type="button" class="btn btn-ghost btn-square text-2xl">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('call-queue-{{ $label }}', ({
                data
            }) => {
                console.log('Narrating:', data);

                const digits = String(data.queue_number).split('').join('. ');
                const text = `Calling. ${data.label} Number. ${digits}. Please proceed to the front desk.`;

                function speakWithVoice() {
                    const voices = window.speechSynthesis.getVoices();

                    // Try to find the preferred voice, fallback to first available
                    const selectedVoice = voices.find(voice =>
                            voice.name.toLowerCase().includes('female') &&
                            voice.lang.toLowerCase().includes('en')
                        ) ||
                        voices.find(voice =>
                            voice.name.toLowerCase().includes('english') &&
                            voice.lang.toLowerCase().includes('en')
                        ) ||
                        voices[0];

                    if (!selectedVoice) {
                        console.warn("No voice available yet. Retrying...");
                        setTimeout(speakWithVoice, 100); // Retry after 100ms
                        return;
                    }

                    const message = new SpeechSynthesisUtterance(text);
                    message.voice = selectedVoice;
                    message.lang = 'en-US';
                    message.rate = 1.2;


                    window.speechSynthesis.speak(message);
                }

                // Edge case: voices not loaded yet
                if (window.speechSynthesis.getVoices().length === 0) {
                    window.speechSynthesis.onvoiceschanged = speakWithVoice;
                } else {
                    speakWithVoice();
                }
            });
        });
    </script>

</div>
