<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate([
            'name' => 'Zainal Hasan',
            'email' => 'mail@zhanang.id',
            'password' => Hash::make('123123123'),
        ]);
    }
}
