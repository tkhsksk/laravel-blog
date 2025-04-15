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
            'name' => 'neneichido',
            'email' => 'tkhsksk0318@gmail.com',
            'password' => Hash::make('tkhs5789'),
        ]);
    }
}
