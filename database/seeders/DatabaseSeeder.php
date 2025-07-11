<?php

namespace Database\Seeders;

use App\Models\Queue;
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
        Role::firstOrCreate(['name' => 'guest']);

        $guest = User::create([
            'first_name' => 'Guest',
            'middle_name' => 'User',
            'last_name' => 'Example',
            'extension_name' => null,
            'email' => 'guest@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $guest->assignRole('guest');
        $admin = User::create([
            'first_name' => 'Admin',
            'middle_name' => 'User',
            'last_name' => 'Example',
            'extension_name' => null,
            'email' => 'admin@gmail.com',
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

        // fake users
        User::factory()->count(50)->create()->each(function ($user) {
            $roles = ['admin', 'operator', 'officer', 'guest'];
            $user->assignRole($roles[array_rand($roles)]);
        });
        // fake queue numbers
        Queue::factory()->count(50)->create();
    }
}
