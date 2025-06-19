<form wire:submit.prevent='submitQueue' method="post" class="w-[80%]">
    {{-- fullname --}}
    <fieldset class="fieldset w-full">
        <legend class="fieldset-legend uppercase w-full">fullname</legend>
        <input wire:model='fullname' type="text" class="input w-full" placeholder="Enter fullname" />
        @error('fullname')
            <p class="label w-full text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>

    {{-- company --}}
    <fieldset class="fieldset w-full">
        <legend class="fieldset-legend uppercase w-full">company</legend>
        <input wire:model='company' type="text" class="input w-full" placeholder="Enter company" />
        @error('company')
            <p class="label w-full text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>

    {{-- address --}}
    <fieldset class="fieldset w-full">
        <legend class="fieldset-legend uppercase w-full">address</legend>
        <input wire:model='address' type="text" class="input w-full" placeholder="Enter address" />
        @error('address')
            <p class="label w-full text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>

    {{-- contact-number --}}
    <fieldset class="fieldset w-full">
        <legend class="fieldset-legend uppercase w-full">contact-number</legend>
        <input wire:model='contact_number' type="tel" class="input w-full" placeholder="Enter contact-number" />
        @error('contact_number')
            <p class="label w-full text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>

    <button type="submit" class="btn btn-sm btn-success w-full mt-4">Confirm</button>
</form>
