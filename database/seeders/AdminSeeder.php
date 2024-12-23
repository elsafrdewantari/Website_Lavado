<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'user_name' => 'Admin123',
            'password' => bcrypt('123'), // Menggunakan bcrypt untuk hashing
        ]);
    }
}
