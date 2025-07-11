<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public function render()
    {
        return view('livewire.admin.user-list', ['users' => User::with('roles')->orderBy('created_at', 'desc')->get()]);
    }
}
