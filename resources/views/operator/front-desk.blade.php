<x-app-layout>
    <div wire:poll.1s class="grow grid grid-cols-2 gap-4">
        @livewire('operator.queue-card', ['label' => 'receiving', 'queueType' => 'receiving', 'color' => 'bg-red-400'])
        @livewire('operator.queue-card', ['label' => 'compliance', 'queueType' => 'compliance', 'color' => 'bg-blue-400'])
        @livewire('operator.queue-card', ['label' => 'sena inquiries', 'queueType' => 'sena_inquiries', 'color' => 'bg-yellow-400'])
        @livewire('operator.queue-card', ['label' => 'inquiries / rfa', 'queueType' => 'inquiries_rfa', 'color' => 'bg-green-400'])
    </div>

</x-app-layout>
