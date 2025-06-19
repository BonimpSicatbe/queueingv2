<x-layouts.guest>

    {{-- body --}}
    <div class="flex flex-col items-center h-full w-full gap-4 grow">
        <div class="uppercase font-bold text-2xl text-center">Fill up sena inquiries form</div>

        @livewire('guest.queue', ['queueType' => 'sena'])
    </div>

</x-layouts.guest>
