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
            'name' => 'admin',
            'user_type'=>'admin',
            'username' => 'admin123',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
<<<<<<< HEAD
=======
        DB::table('users')->insert([
            'name' => 'ketua',
            'user_type'=>'ketua',
            'username' => 'ketua123',
            'email' => 'ketua@softui.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'bendahara',
            'user_type'=>'bendahara',
            'username' => 'bendahara123',
            'email' => 'bendahara@softui.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'sekretaris',
            'username' => 'sekretais123',
            'email' => 'sekretaris@softui.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
>>>>>>> 8267781529a27c10a783dbd89e301f3eb699e8c9
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
