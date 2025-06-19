<x-app-layout>
    <div class="grow border overflow-hidden">
        @livewire('operator.sena.table-list')
    </div>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession
</x-app-layout>
