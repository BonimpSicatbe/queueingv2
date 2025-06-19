<div class="h-full w-full overflow-auto rounded-lg bg-white">
    <table class="table uppercase text-center">
        <thead class="bg-yellow-300">
            <tr>
                <th colspan="4" class="font-bold">SEnA Scheduled Lists</th>
                <th class="">
                    <label for="create_sena_schedule" class="btn btn-sm btn-wide uppercase"><i
                            class="fa-solid fa-plus"></i>create</label>
                </th>
            </tr>
            <tr class="bg-yellow-300 sticky top-0">
                <th>TIME</th>
                <th>REQUESTING PARTY</th>
                <th>RESPONDING PARTY</th>
                <th>OFFICER</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @if ($senas->count() > 0)
                @foreach ($senas as $sena)
                    <tr
                        @if ($sena->status == 'cancelled') class="bg-gray-200"
                        @elseif($sena->status == 'completed' || $sena->status == 'ongoing') class="bg-green-200"
                        @elseif($sena->status == 'resched') class="bg-blue-200" @endif>
                        <td>
                            {{ $sena->status == 'cancelled' ? 'cancelled' : \Carbon\Carbon::parse($sena->schedule)->format('M j, Y - g:i A') }}
                        </td>
                        <td>{{ $sena->requesting_party }}</td>
                        <td>{{ $sena->responding_party }}</td>
                        <td>{{ $sena->user->first_name }} {{ $sena->user->last_name }}</td>
                        <td>
                            <button type="button" wire:click='confirmSchedule({{ $sena->id }})'
                                class="btn btn-sm btn-ghost btn-success"><i
                                    class="fa-solid fa-check-square"></i></button>
                            <button type="button" wire:click='cancelSchedule({{ $sena->id }})'
                                class="btn btn-sm btn-ghost btn-error"><i class="fa-solid fa-xmark-square"></i></button>
                            {{-- Fixed edit button --}}
                            <label wire:click='editSenaSchedule({{ $sena->id }})' for="editSchedule"
                                class="btn btn-sm btn-ghost btn-info">
                                <i class="fa-solid fa-edit"></i>
                            </label>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="font-bold">No Pending Schedules.</td>
                </tr>
            @endif
        </tbody>
    </table>

    {{-- create new sena schedule modal --}}
    <input type="checkbox" id="create_sena_schedule" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 max-w-4xl">
            <h3 class="text-lg font-bold">Create New Sena Schedule</h3>

            <form wire:submit.prevent='createSenaSchedule' method="post" class="grid grid-cols-2 gap-2 w-full">
                <fieldset class="fieldset w-full">
                    <legend class="fieldset-legend w-full">Enter Requesting Party Name</legend>
                    <input type="text" class="input w-full" wire:model='requesting_party' id="requesting_party"
                        placeholder="Enter requesting party name" />
                    @error('requesting_party')
                        <p class="label w-full text-red-500">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset w-full">
                    <legend class="fieldset-legend w-full">Enter Responding Party Name</legend>
                    <input type="text" class="input w-full" wire:model='responding_party' id="responding_party"
                        placeholder="Enter responding party name" />
                    @error('responding_party')
                        <p class="label w-full text-red-500">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset w-full col-span-2">
                    <legend class="fieldset-legend w-full">Enter Sena Schedule</legend>
                    <input type="datetime-local" class="input w-full" wire:model='schedule' id="schedule" />
                    @error('schedule')
                        <p class="label w-full text-red-500">{{ $message }}</p>
                    @enderror
                </fieldset>
                <button type="submit" class="btn btn-sm btn-success text-white uppercase col-span-2">create</button>
            </form>
        </div>
        <label class="modal-backdrop" for="create_sena_schedule"></label>
    </div>

    {{-- edit sena schedule modal --}}
    <input type="checkbox" id="editSchedule" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 max-w-4xl">
            <h3 class="text-lg font-bold">Edit Sena Schedule</h3>

            <form wire:submit.prevent="updateSenaSchedule" method="post" class="grid grid-cols-2 gap-2 w-full">
                <fieldset class="fieldset w-full col-span-2">
                    <legend class="fieldset-legend w-full">Enter Sena Schedule</legend>
                    <input type="datetime-local" class="input w-full" wire:model='editSchedule' />
                    @error('editSchedule')
                        <p class="label w-full text-red-500">{{ $message }}</p>
                    @enderror
                </fieldset>
                <button type="submit" class="btn btn-sm btn-success text-white uppercase col-span-2">update</button>
            </form>
        </div>
        <label class="modal-backdrop" for="editSchedule"></label>
    </div>
</div>
