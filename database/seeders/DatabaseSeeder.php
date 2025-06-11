<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'operator']);
        Role::firstOrCreate(['name' => 'officer']);

        $admin = User::create([
            'first_name' => 'Doming',
            'middle_name' => 'Hilapo',
            'last_name' => 'Ricalde',
            'extension_name' => null,
            'email' => 'domingricalde@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');
        $operator = User::create([
            'first_name' => 'Operator',
            'middle_name' => 'User',
            'last_name' => 'Example',
            'extension_name' => null,
            'email' => 'operator@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $operator->assignRole('operator');
        $officer = User::create([
            'first_name' => 'Officer',
            'middle_name' => 'User',
            'last_name' => 'Example',
            'extension_name' => null,
            'email' => 'officer@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $officer->assignRole('officer');
    }
}
