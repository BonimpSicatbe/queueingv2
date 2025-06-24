<x-layouts.guest>

    {{-- body --}}
    <div class="flex flex-col items-center h-full w-full gap-4 grow">
        <div class="uppercase font-bold text-2xl text-center">Fill up inquiries / rfa form</div>
        <div class="w-full grow">
            @livewire('guest.queue', ['queueType' => 'inquiries / r. f. a.'])
        </div>
    </div>

</x-layouts.guest>
