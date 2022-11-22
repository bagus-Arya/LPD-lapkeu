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
            'akun_types'=>'beban',
            'no_akun'=>201
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Penerimaan',
            'akun_types'=>'penerimaan',
            'no_akun'=>202
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pengeluaran',
            'akun_types'=>'pengeluaran',
            'no_akun'=>203
        ]);

        // Aktiva
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Kas',
            'akun_types'=>'penerimaan',
            'no_akun'=>100
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Tabungan',
            'akun_types'=>'penerimaan',
            'no_akun'=>130
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Deposito',
            'akun_types'=>'penerimaan',
            'no_akun'=>131
        ]);

        // Passiva
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Modal Disetor',
            'akun_types'=>'penerimaan',
            'no_akun'=>421
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Simpanan Berjangka',
            'akun_types'=>'penerimaan',
            'no_akun'=>330
        ]);

    }
}
