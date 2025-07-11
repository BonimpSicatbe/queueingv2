<form wire:submit.prevent="createNewUser" class="grid grid-cols-2 gap-x-4 w-full">
    <fieldset class="fieldset">
        <legend class="fieldset-legend">First name</legend>
        <input type="text" class="input input-md w-full" wire:model="first_name" placeholder="Enter first name" />
        @error('first_name')
            <p class="label text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Middle name</legend>
        <input type="text" class="input input-md w-full" wire:model="middle_name" placeholder="Enter middle name" />
        @error('middle_name')
            <p class="label text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Last name</legend>
        <input type="text" class="input input-md w-full" wire:model="last_name" placeholder="Enter last name" />
        @error('last_name')
            <p class="label text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Extension name</legend>
        <input type="text" class="input input-md w-full" wire:model="extension_name"
            placeholder="Enter extension name" />
        @error('extension_name')
            <p class="label text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>

    <fieldset class="fieldset">
        <legend class="fieldset-legend">Role</legend>
        <select class="select select-md w-full" wire:model="role">
            <option value="" disabled>Select a Role</option>
            <option value="admin">Admin</option>
            <option value="operator">Operator</option>
            <option value="officer">Officer</option>
        </select>
        @error('role')
            <span class="label text-red-500">{{ $message }}</span>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Email</legend>
        <input type="email" class="input input-md w-full" wire:model="email" placeholder="Enter email" />
        @error('email')
            <p class="label text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Password</legend>
        <input type="password" class="input input-md w-full" wire:model="password" placeholder="Enter password" />
        @error('password')
            <p class="label text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Confirm Password</legend>
        <input type="password" class="input input-md w-full" wire:model="confirm_password"
            placeholder="Enter confirm password" />
        @error('confirm_password')
            <p class="label text-red-500">{{ $message }}</p>
        @enderror
    </fieldset>
    <button type="submit" class="col-span-2 btn btn-sm btn-success text-white">Create User</button>
</form>
