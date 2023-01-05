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
            'nama_akun'=>'Pendapatan Operasional (L/R)',
            'no_akun'=>101
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pendapatan Bunga dari Nasabah',
            'no_akun'=>102
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pendapatan Bunga dari Lain-lain',
            'no_akun'=>103
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pendapatan Lain-lain',
            'no_akun'=>104
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Ongkos Administasi',
            'no_akun'=>301
        ]);

        // Aktiva
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Kas',
            'no_akun'=>100
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Bank BPD (Giro) Neraca Percobaan',
            'no_akun'=>131
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Bank BPD (Tabungan) Neraca Percobaan',
            'no_akun'=>131
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Bank BPD (Deposito) Neraca Percobaan',
            'no_akun'=>131
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Bank Lembaga Lain (Giro) Neraca Percobaan',
            'no_akun'=>131
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Bank Lembaga Lain (Tabungan) Neraca Percobaan',
            'no_akun'=>131
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Bank Lembaga Lain (Deposito) Neraca Percobaan',
            'no_akun'=>131
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Giro',
            'no_akun'=>131
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Tabungan',
            'no_akun'=>131
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Deposito',
            'no_akun'=>131
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pinjaman yg Diberikan Bulanan',
            'no_akun'=>171
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pinjaman yg Diberikan Musiman',
            'no_akun'=>173
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Cadangan Piutang Ragu - Ragu',
            'no_akun'=>172
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Harga Perolehan',
            'no_akun'=>211
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Akumulasi Penyusutan',
            'no_akun'=>212
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Rupa - Rupa Aktiva',
            'no_akun'=>230
        ]);

        // Biaya
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Perjalanan',
            'no_akun'=>300
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Pemasaran / Promosi',
            'no_akun'=>310
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Jasa dan Umum',
            'no_akun'=>320
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Pegawai',
            'no_akun'=>330
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Kantor',
            'no_akun'=>340
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Penyusutan',
            'no_akun'=>350
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Pinjaman Ragu - Ragu',
            'no_akun'=>360
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Lain - Lain',
            'no_akun'=>370
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Bunga Tabungan',
            'no_akun'=>380
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Bunga Simpanan Berjangka',
            'no_akun'=>390
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Bunga Lain - Lain',
            'no_akun'=>400
        ]);
        // Neraca Percobaan, Laba/Rugi
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Giro (Hasil Bunga Dari Bank Lain)',
            'no_akun'=>121
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Simpanan Berjangka (Hasil Bunga Dari Bank Lain)',
            'no_akun'=>122
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pinjaman yang Diberikan (Hasil Bunga Dari Bank Lain)',
            'no_akun'=>123
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Lainnya (Hasil Bunga Dari Bank Lain)',
            'no_akun'=>124
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pinjaman yang Diberikan (Hasil Bunga Dari Pihak Ketiga Bukan Bank)',
            'no_akun'=>126
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Lainnya (Hasil Bunga Dari Pihak Ketiga Bukan Bank)',
            'no_akun'=>129
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Tabungan Wajib',
            'no_akun'=>130
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Tabungan Sukarela',
            'no_akun'=>132
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pendapatan Operational Lainnya (L/R)',
            'no_akun'=>170
        ]);
     
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Operasional (L/R)',
            'no_akun'=>180
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Simpanan Berjangka (Biaya Bunga Kepada Bank Lain)',
            'no_akun'=>194
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pinjaman yang Diterima (Biaya Bunga Kepada Bank Lain)',
            'no_akun'=>195
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Lainnya (Biaya Bunga Kepada Bank Lain)',
            'no_akun'=>199
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Simpanan Berjangka (Biaya Bunga Kepada Pihak Ketiga Bukan Bank)',
            'no_akun'=>203
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Tabungan (Biaya Bunga Kepada Pihak Ketiga Bukan Bank)',
            'no_akun'=>206
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Lainnya (Biaya Bunga Kepada Pihak Ketiga Bukan Bank)',
            'no_akun'=>209
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Tenaga Kerja (L/R)',
            'no_akun'=>241
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Pemeliharaan dan Perbaikan (L/R)',
            'no_akun'=>280
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Aktivitas Tetap dan Inventaris (L/R)',
            'no_akun'=>291
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Piutang (L/R)',
            'no_akun'=>299
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Barang dan Jasa Dari Pihak Ketiga (L/R)',
            'no_akun'=>300
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Operasional Lainnya (L/R)',
            'no_akun'=>310
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Laba Operational (A-B) (L/R)',
            'no_akun'=>320
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Rugi Operational (B-A) (L/R)',
            'no_akun'=>330
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pendapatan Non Operasional (L/R)',
            'no_akun'=>340
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Biaya Non Operasional (L/R)',
            'no_akun'=>390
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Laba Non Operational (D-E) (L/R)',
            'no_akun'=>450
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Rugi Non Operational (E-D) (L/R)',
            'no_akun'=>460
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Laba Tahun Berjalan (L/R)',
            'no_akun'=>470
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Rugi Tahun Berjalan (L/R)',
            'no_akun'=>480
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Laba Tahun Lalu (L/R)',
            'no_akun'=>530
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Rugi Tahun Lalu (L/R)',
            'no_akun'=>540
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pajak Penghasilan (L/R)',
            'no_akun'=>555
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Jumlah Rugi 2 (L/R)',
            'no_akun'=>560
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Jumlah Rugi 3 (L/R)',
            'no_akun'=>570
        ]);

        // Passiva
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Tabungan',
            'no_akun'=>320
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Simpanan Berjangka',
            'no_akun'=>330
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Antar Bank Pasiva',
            'no_akun'=>350
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pinjaman yang Diterima',
            'no_akun'=>369
        ]);
      
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Pinjaman di Bank Lain',
            'no_akun'=>371
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Rupa - Rupa Pasiva',
            'no_akun'=>400
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Modal Disetor',
            'no_akun'=>421
        ]);
      
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Modal Donasi',
            'no_akun'=>422
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Cadangan Umum',
            'no_akun'=>430
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Cadangan Khusus/Tujuan',
            'no_akun'=>431
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Cadangan Pinjaman Ragu-Ragu',
            'no_akun'=>432
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Laba',
            'no_akun'=>441
        ]);
        
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Rugi',
            'no_akun'=>442
        ]);

        DB::table('no_akuns')->insert([
            'nama_akun'=>'Kewajiban Lain-Lain',
            'no_akun'=>381
        ]);
        DB::table('no_akuns')->insert([
            'nama_akun'=>'Aktiva Lain lain',
            'no_akun'=>231
        ]);
    }
}
