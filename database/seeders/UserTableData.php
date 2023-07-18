<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableData extends Seeder
{
    public function run()
    {
        User::insert([
            'name' => 'marwan',
            'email' => 'marwanmohamed7887@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'admin'
        ]);
    }
}
