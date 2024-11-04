<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Doctor Admin',
            'email' => 'fe.catalanv@duocuc.cl',
            'password' => Hash::make('1234trauma'), 
        ]);
    }
}
