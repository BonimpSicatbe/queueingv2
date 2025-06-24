<x-layouts.guest>
    <div class="flex flex-col h-full w-full gap-4 grow">
        <div class="uppercase font-bold text-2xl text-center">how may i help you?</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-full w-full">
            {{-- receiving --}}
            <a href="{{ route('welcome.receiving') }}"
                class="bg-blue-400 hover:bg-blue-600 rounded-lg flex items-center justify-center text-lg md:text-2xl uppercase font-bold transition-all py-8">receiving</a>

            {{-- compliance --}}
            <a href="{{ route('welcome.compliance') }}"
                class="bg-red-400 hover:bg-red-600 rounded-lg flex items-center justify-center text-lg md:text-2xl uppercase font-bold transition-all py-8">compliance</a>

            {{-- sena --}}
            <a href="{{ route('welcome.sena-inquiries') }}"
                class="bg-yellow-400 hover:bg-yellow-600 rounded-lg flex items-center justify-center text-lg md:text-2xl uppercase font-bold transition-all py-8">sena
                inquiries</a>

            {{-- inquiries --}}
            <a href="{{ route('welcome.inquiries') }}"
                class="bg-green-400 hover:bg-green-600 rounded-lg flex items-center justify-center text-lg md:text-2xl uppercase font-bold transition-all py-8">inquiries
                / rfa / others</a>
        </div>
    </div>
</x-layouts.guest>
