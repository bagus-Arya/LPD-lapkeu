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
            'nama_akun'=>'beban',
            'akun_types'=>'beban',
            'no_akun'=>201
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'pemasukan',
            'akun_types'=>'pemasukan',
            'no_akun'=>202
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'pengeluaran',
            'akun_types'=>'pengeluaran',
            'no_akun'=>203
        ]);
        // DB::table('transaksis')->insert([
        //     'no_akun_id'=>201,
        //     'keterangan'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam neque nihil aut quibusdam cum commodi error, placeat possimus ipsam fugiat praesentium quisquam, iusto dolore perspiciatis accusantium? Eos, autem. Quis, fugiat.',
        //     'jumlah'=>21000,
        //     'konfirmasi'=>false
        // ]);
    }
}
