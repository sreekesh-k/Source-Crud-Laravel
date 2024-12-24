<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AdminSeeder extends Seeder
{
    public function run()
    {
        // Creating an admin with a hashed password
        Admin::create([
            'name' => 'Admin Name',
            'email' => 'sample@gmail.com',
            'password' => Hash::make('sample@123')  // Change 'new-password' to something you can remember
        ]);
    }
}
   

