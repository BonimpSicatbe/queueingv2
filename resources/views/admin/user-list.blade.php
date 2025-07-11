<x-app-layout>
    <div class="grow">
        <div class="flex flex-col gap-4 max-w-7xl mx-auto bg-white rounded-lg p-4">
            {{-- header --}}
            <div class="text-lg font-bold uppercase">Users List</div>

            {{-- subheader (search bar | create button) --}}

            <div class="flex flex-row gap-4 items-center justify-between">
                {{-- <input type="text" name="search" id="search" placeholder="search by name" class="input input-md input-bordered"> --}}
                <input type="text" name="search" id="search" placeholder="search by name"
                    class="input input-md input-bordered" oninput="filterTable()">
                <label for="create_new_user_modal" class="btn btn-md btn-success btn-outline"><i
                        class="fa-solid fa-plus min-w-[20px] text-center"></i> Create Account</label>

            </div>

            @livewire('admin.user-list')
        </div>
    </div>

    {{-- create new user modal --}}
    <input type="checkbox" id="create_new_user_modal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-11/12 max-w-5xl">
            <div class="flex flex-row items-center justify-between w-full">
                <h3 class="text-lg font-bold">Create New User</h3>
                <label for="create_new_user_modal" class="btn btn-sm btn-circle btn-default"><i
                        class="fa-solid fa-xmark"></i></label>
            </div>

            {{-- new user form --}}
            @livewire('admin.create-user-form')
        </div>
    </div>

    <script>
        function filterTable() {
            const input = document.getElementById('search');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('userTable');
            const trs = table.getElementsByTagName('tr');

            for (let i = 1; i < trs.length; i++) { // skip header row
                const tds = trs[i].getElementsByTagName('td');
                // Concatenate first 4 columns (first, middle, last, extension)
                let fullName = '';
                for (let j = 0; j < 4; j++) {
                    if (tds[j]) {
                        fullName += tds[j].textContent.toLowerCase() + ' ';
                    }
                }
                // Split filter into words, check if all words are present in fullName
                const terms = filter.split(' ').filter(Boolean);
                const found = terms.every(term => fullName.includes(term));
                trs[i].style.display = found ? '' : 'none';
            }
        }
    </script>
</x-app-layout>
