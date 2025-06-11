<x-app-layout>
    <div class="grow grid grid-cols-2 gap-4">
        @livewire('operator.queue-card', ['label' => 'receiving', 'queueType' => 'receiving', 'color' => 'red'])
        @livewire('operator.queue-card', ['label' => 'compliance', 'queueType' => 'compliance', 'color' => 'blue'])
        @livewire('operator.queue-card', ['label' => 'sena inquiries', 'queueType' => 'sena inquiries', 'color' => 'yellow'])
        @livewire('operator.queue-card', ['label' => 'inquiries / rfa', 'queueType' => 'inquiries', 'color' => 'green'])
    </div>
</x-app-layout>
