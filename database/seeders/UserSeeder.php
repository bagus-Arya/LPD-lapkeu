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
            'fullname' => 'ketua',
            'user_type'=>'ketua',
            'username' => 'ketua123',
            'email' => 'ketua@softui.com',
            'password' => Hash::make('secret'),
            'phone'=>'12345',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'fullname' => 'bendahara',
            'user_type'=>'bendahara',
            'username' => 'bendahara123',
            'email' => 'bendahara@softui.com',
            'password' => Hash::make('secret'),
            'phone'=>'12345',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'fullname' => 'sekretaris',
            'username' => 'sekretaris123',
            'user_type'=>'sekretaris',
            'email' => 'sekretaris@softui.com',
            'password' => Hash::make('secret'),
            'phone'=>'12345',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
