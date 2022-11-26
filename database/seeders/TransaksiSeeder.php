<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Beban',
            'no_akun'=>201
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Penerimaan',
            'no_akun'=>202
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pengeluaran',
            'no_akun'=>203
        ]);

        // Aktiva
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Kas',
            'no_akun'=>100
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Tabungan',
            'no_akun'=>130
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Deposito',
            'no_akun'=>131
        ]);

        // Passiva
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Modal Disetor',
            'no_akun'=>421
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Simpanan Berjangka',
            'no_akun'=>330
        ]);

    }
}
