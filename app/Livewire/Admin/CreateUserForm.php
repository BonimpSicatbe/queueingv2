<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateUserForm extends Component
{
    #[Validate('required|string|max:255')]
    public $first_name = '';

    #[Validate('nullable|string|max:255')]
    public $middle_name = '';

    #[Validate('required|string|max:255')]
    public $last_name = '';

    #[Validate('nullable|string|max:255')]
    public $extension_name = '';

    #[Validate('required|string|max:255|in:admin,operator,officer')]
    public $role = '';

    #[Validate('required|email|max:255')]
    public $email = '';

    #[Validate('required|string|min:8|max:255')]
    public $password = '';

    public function createNewUser()
    {
        Log::info('Starting user creation', [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'extension_name' => $this->extension_name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        $this->validate();

        // Create the user
        $user = \App\Models\User::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'extension_name' => $this->extension_name,
            'email' => $this->email,
            'password' => bcrypt($this->password), // Default password, consider using a more secure method
        ]);

        Log::info('User created', ['user_id' => $user->id]);

        // Assign the role
        $user->assignRole($this->role);

        Log::info('Role assigned', [
            'user_id' => $user->id,
            'role' => $this->role,
        ]);

        // Reset the form fields
        $this->reset(['first_name', 'middle_name', 'last_name', 'extension_name', 'email', 'role']);
        session()->flash('message', 'User created successfully.');
    }

    public function render()
    {
        return view('livewire.admin.create-user-form', ['users' => User::with('roles')->get()]);
    }
}
