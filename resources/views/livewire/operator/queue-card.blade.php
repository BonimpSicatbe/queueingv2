<div class="flex flex-col grow rounded-lg overflow-hidden bg-white">
    {{-- label --}}
    <div class="w-full text-center font-bold uppercase py-1 text-2xl bg-{{ $color }}-400">{{ $label }}
    </div>

    {{-- number --}}
    <div class="w-full h-full text-center text-7xl font-bold flex items-center justify-center">{{ $queueNumber }}</div>

    {{-- controls --}}
    <div class="flex flex-row gap-4 justify-evenly py-2 bg-{{ $color }}-400">
        <button wire:click='decrement' type="button" class="btn btn-ghost btn-square text-2xl"><i class="fa-solid fa-minus"></i></button>
        <button wire:click='' type="button" class="btn btn-ghost btn-square text-2xl"><i class="fa-solid fa-play"></i></button>
        <button wire:click='increment' type="button" class="btn btn-ghost btn-square text-2xl"><i class="fa-solid fa-plus"></i></button>
    </div>
</div>
