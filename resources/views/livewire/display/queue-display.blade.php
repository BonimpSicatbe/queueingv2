<div wire:poll class="flex flex-col gap-8 w-full h-full">

    <div class="flex flex-col gap-4 h-full w-full">
        {{-- top --}}
        <div class="flex flex-col gap-8 items-center justify-center w-full bg-white rounded-lg p-4">
            <div class="text-lg font-bold uppercase">in queue</div>

            <div class="flex flex-col gap-2 text-center">
                <div class="text-lg font-bold uppercase">{{ $queue->queue_type ?? '' }} number</div>
                <div class="text-9xl uppercase font-bold">
                    {{ isset($queue) && isset($queue->id) ? str_pad($queue->id, 4, '0', STR_PAD_LEFT) : '----' }}
                </div>
            </div>
        </div>

        {{-- bottom --}}
        <div class="w-full bg-white rounded-lg p-2 uppercase font-bold text-lg text-center">next in queue</div>

        <div wire:poll class="flex flex-col gap-2">
            @forelse ($waitList as $wait)
                <div class="flex flex-col p-2 w-full text-center uppercase rounded-lg bg-white">
                    <div class="text-lg font-bold">{{ $wait->queue_type }} number</div>
                    <div class="text-5xl font-bold">{{ str_pad($wait->id, 4, '0', STR_PAD_LEFT) }}</div>
                </div>
            @empty
                <div class="w-full bg-white rounded-lg p-2 uppercase font-bold text-lg text-center">-</div>
            @endforelse
        </div>
    </div>
</div>
