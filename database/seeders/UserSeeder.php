<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'level' => 'admin',
            'password' => Hash::make('password')
        ];

        User::create($admin);

        $user = [
            'name' => 'user',
            'email' => 'user@user.com',
            'level' => 'user',
            'password' => Hash::make('password')
        ];

        User::create($user);
    }
}
