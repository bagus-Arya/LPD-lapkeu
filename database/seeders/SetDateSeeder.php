<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('date_range')->insert([
            'start'=> \Carbon\Carbon::now(),
            'end'=> \Carbon\Carbon::now(),
            'start_mutasi'=> \Carbon\Carbon::now(),
            'end_mutasi'=> \Carbon\Carbon::now()
        ]);
    }
}
