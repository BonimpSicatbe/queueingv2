<div wire:poll.1s class="h-full w-full overflow-auto rounded-lg bg-white uppercase">
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto text-center">
            <thead class="bg-yellow-400 text-black text-2xl md:text-3xl lg:text-4xl">
                <tr>
                    <th class="text-center py-4" colspan="4">SENA SCHEDULED LISTS</th>
                </tr>
                <tr class="bg-yellow-400 sticky top-0">
                    <th class="px-4 py-4 text-lg md:text-xl lg:text-2xl">TIME</th>
                    <th class="px-4 py-4 text-lg md:text-xl lg:text-2xl">REQUESTING PARTY</th>
                    <th class="px-4 py-4 text-lg md:text-xl lg:text-2xl">RESPONDING PARTY</th>
                    <th class="px-4 py-4 text-lg md:text-xl lg:text-2xl">OFFICER</th>
                </tr>
            </thead>
            <tbody>
                @if ($senas->isNotEmpty())
                    @foreach ($senas as $sena)
                        <tr
                            @if ($sena->status == 'cancelled') class="bg-gray-200"
                            @elseif($sena->status == 'completed' || $sena->status == 'ongoing') class="bg-green-200"
                            @elseif($sena->status == 'resched') class="bg-blue-200" @endif>
                            <td class="px-4 py-4 text-base md:text-xl lg:text-2xl">
                                {{ $sena->status == 'cancelled' ? 'cancelled' : \Carbon\Carbon::parse($sena->schedule)->format('M j, Y - g:i A') }}
                            </td>
                            <td class="px-4 py-4 text-base md:text-xl lg:text-2xl">{{ $sena->requesting_party }}</td>
                            <td class="px-4 py-4 text-base md:text-xl lg:text-2xl">{{ $sena->responding_party }}</td>
                            <td class="px-4 py-4 text-base md:text-xl lg:text-2xl">{{ $sena->user->first_name }}
                                {{ $sena->user->last_name }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="px-4 py-4 font-bold text-xl md:text-2xl lg:text-3xl">No Pending
                            Schedules.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
