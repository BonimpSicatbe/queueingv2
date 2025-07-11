<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class EditUser extends Component
{
    public $user;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $extension_name;
    public $email;
    public $role;

    public function mount($user)
    {
        $this->user = $user;
        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;
        $this->extension_name = $user->extension_name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function updateUser() {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'extension_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'role' => 'required|string|in:admin,operator,officer',
        ]);

        $this->user->update([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'extension_name' => $this->extension_name,
            'email' => $this->email,
        ]);

        $this->user->syncRoles($this->role);

        session()->flash('message', 'User updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.edit-user', [
            'user' => $this->user,
        ]);
    }
}
