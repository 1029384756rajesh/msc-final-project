<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'is_admin' => true
        ]);

        DB::table('settings')->insert([
            'about' => 'This is a ecommerce company',
            'email' => 'admin@admin.com',
            'mobile' => '1234567890',
            'tax' => 5,
            'shipping_cost' => 349
        ]);
    }
}
