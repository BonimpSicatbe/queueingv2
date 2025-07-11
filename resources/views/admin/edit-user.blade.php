<x-app-layout>
    <div class="grow overflow-auto">
        <div class="flex flex-col gap-4 max-w-7xl mx-auto bg-white rounded-lg p-4">
            {{-- header --}}
            <div class="text-lg font-bold uppercase">Edit User</div>

            {{-- edit user form --}}
            @livewire('admin.edit-user', ['user' => $user])
        </div>
    </div>
</x-app-layout>
