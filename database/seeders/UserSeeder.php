<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'username' => 'admin123',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // DB::table('users')->insert([
        //     'id' => 1,
        //     'name' => 'Ni Putu Rahma',
        //     'username' => 'rahma123',
        //     'email' => 'rahma@softui.com',
        //     'password' => Hash::make('rahma'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
