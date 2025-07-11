<form wire:submit.prevent='updateUser' class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
    <fieldset class="fieldset">
        <legend class="fieldset-legend">First Name</legend>
        <input type="text" class="input w-full" wire:model="first_name" placeholder="enter first name" />
        @error('first_name')
            <p class="label">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Middle Name</legend>
        <input type="text" class="input w-full" wire:model="middle_name" placeholder="enter middle name" />
        @error('middle_name')
            <p class="label">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Last Name</legend>
        <input type="text" class="input w-full" wire:model="last_name" placeholder="enter last name" />
        @error('last_name')
            <p class="label">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Extension Name</legend>
        <input type="text" class="input w-full" wire:model="extension_name" placeholder="enter extension name" />
        @error('extension_name')
            <p class="label">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Email</legend>
        <input type="email" class="input w-full" wire:model="email" placeholder="enter email" />
        @error('email')
            <p class="label">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Role</legend>
        <select class="select w-full" class="" wire:model="role">
            <option disabled selected>Select a Role</option>
            <option value="operator">Operator</option>
            <option value="officer">Officer</option>
            <option value="admin">Admin</option>
        </select>
        @error('role')
            <span class="label">Optional</span>
        @enderror
    </fieldset>
    <button type="submit" class="btn btn-sm btn-success col-span-2">Update</button>
</form>
