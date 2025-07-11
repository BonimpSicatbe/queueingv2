{{-- livewire/admin/user-list --}}
<div class="max-h-[500px] overflow-auto">
    <table id="userTable" class="table table-md text-center">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Extension Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->middle_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->extension_name }}</td>
                    <td>
                        @if ($user->roles->isNotEmpty())
                            {{ $user->roles->pluck('name')->join(', ') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y') }}</td>
                    <td>{{ $user->updated_at->format('F d, Y') }}</td>
                    <td>
                        <div class="dropdown dropdown-end {{ $users->count() - $index <= 2 ? 'dropdown-top' : '' }}">
                            <div tabindex="0" role="button" class="btn btn-sm btn-ghost btn-info m-1"><i
                                    class="fa-solid fa-user-pen"></i></div>
                            <ul tabindex="0"
                                class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-lg">
                                <li><a href="{{ route('admin.user.edit', $user) }}"
                                        class="text-green-500 hover:text-green-700"><i
                                            class="fa-solid fa-eye min-w-[20px] text-center"></i> View</a></li>
                                <li><a href="" class="text-red-500 hover:text-red-700"><i
                                            class="fa-solid fa-trash min-w-[20px] text-center"></i> Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No User Listed</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
