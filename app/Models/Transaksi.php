<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\DateRange;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_akun_id',
        'tgl_transaksi',
        'akun_types',
        'keterangan',
        'jumlah',
        'konfirmasi',
    ];

    public function akun()
    {
        return $this->hasOne(NoAkun::class, 'id', 'no_akun_id');
    }
    
    public static function getMutasiKasKredit(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiKasKredit=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');
    }

    public static function getMutasiKasDebet(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiKasDebet=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');
    }

    public static function getKas_AW_Debet(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $Kas_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'6') 
            ->pluck('jumlah')
            ->toArray();
        return $SumKasAWDebet = array_sum($Kas_AW_Debet);
    }

    // Bank BPD Giro Neraca Percobaan
    public static function getBPD_Giro_AW_Debet(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];

        $BPD_Giro_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'7') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBPDGiroAWDebet = array_sum($BPD_Giro_AW_Debet);
    }

    public static function getMutasiBPDGiroDebet(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBPDGiroDebet=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'7') 
        ->sum('jumlah');
    }

    public static function getMutasiBPDGiroKredit(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBPDGiroKredit=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'7') 
        ->sum('jumlah');
    }

    // Bank BPD Tabungan Neraca Percobaan
    public static function getSumBPDTabunganAWDebet(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
    
        $BPD_Tabungan_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'8') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBPDTabunganAWDebet = array_sum($BPD_Tabungan_AW_Debet);
    }
    public static function getMutasiBPDTabunganDebet(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBPDTabunganDebet=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'8') 
        ->sum('jumlah');
    }
    public static function getMutasiBPDTabunganKredit(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBPDTabunganKredit=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'8') 
        ->sum('jumlah');
    }

    // Bank BPD Deposito Neraca Percobaan
    public static function getSumBPDDepositoAWDebet(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
  
        $BPD_Deposito_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'9') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBPDDepositoAWDebet = array_sum($BPD_Deposito_AW_Debet);
    }
    public static function getMutasiBPDDepositoDebet(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBPDDepositoDebet=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'9') 
        ->sum('jumlah');
    }
    public static function getMutasiBPDDepositoKredit(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBPDDepositoKredit=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'9') 
        ->sum('jumlah');
    }

    // Bank BPD lembaga lain giro Neraca Percobaan
    public static function getSumBankLainGiroAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
   
        $Biaya_PegawaiAW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'10') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBankLainGiroAWDebet = array_sum($Biaya_PegawaiAW_Debet);
    }
    public static function getMutasiBankLainGiroDebet(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBankLainGiroDebet=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'10') 
        ->sum('jumlah');
    }
    public static function getMutasiBankLainGiroKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBankLainGiroKredit=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'10') 
        ->sum('jumlah');
    }

    // Bank BPD lembaga lain tabungan Neraca Percobaan
    public static function getSumBankLainTabunganAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
   
        $Biaya_PegawaiAW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'11') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBankLainGiroAWDebet = array_sum($Biaya_PegawaiAW_Debet);
    }
    public static function getMutasiBankLainTabunganDebet(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBankLainGiroDebet=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'11') 
        ->sum('jumlah');
    }
    public static function getMutasiBankLainTabunganKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBankLainGiroKredit=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'11') 
        ->sum('jumlah');
    }

    // Bank BPD lembaga lain deposito Neraca Percobaan
    public static function getSumBankLainDepositoAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $Biaya_PegawaiAW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'12') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBankLainGiroAWDebet = array_sum($Biaya_PegawaiAW_Debet);
    }
    public static function getMutasiBankLainDepositoDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBankLainGiroDebet=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'12') 
        ->sum('jumlah');
    }
    public static function getMutasiBankLainDepositoKredit(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $MutasiBankLainGiroKredit=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'12') 
        ->sum('jumlah');
    }

    // Pinjaman Bulanan Neraca Percobaan
    public static function getSumPinjamanBulananAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'16') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPinjamanBulananDebet(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'16') 
        ->sum('jumlah');
    }
    public static function getMutasiPinjamanBulananKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'16') 
        ->sum('jumlah');
    }

    // Pinjaman Musiman Neraca Percobaan
    public static function getSumPinjamanMusimanDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'17') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPinjamanMusimanDebet(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'17') 
        ->sum('jumlah');
    }
    public static function getMutasiPinjamanMusimanKredit(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'17') 
        ->sum('jumlah');
    }

    // Harga Perolehan Neraca Percobaan
    public static function getSumHargaPerolehanAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'19') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiHargaPerolehanDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'19') 
        ->sum('jumlah');
    }
    public static function getMutasiHargaPerolehanKredit(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'19') 
        ->sum('jumlah');
    }

    // akumulasi penyusutan Neraca Percobaan
    public static function getSumAkumulasiPenyusutanAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'20') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiAkumulasiPenyusutanDebet(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'20') 
        ->sum('jumlah');
    }
    public static function getMutasiAkumulasiPenyusutanKredit(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'20') 
        ->sum('jumlah');
    }
    
    //aktiva lain - lain Neraca Percobaan
    public static function getSumAktivaLainAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'82') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiAktivaLainDebet(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'82') 
        ->sum('jumlah');
    }
    public static function getMutasiAktivaLainKredit(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'82') 
        ->sum('jumlah');
    }

    //tabungan Wajib Neraca Percobaan
    public static function getSumTabunganWajibAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'39') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiTabunganWajibDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'39') 
        ->sum('jumlah');
    }
    public static function getMutasiTabunganWajibKreditt(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'39') 
        ->sum('jumlah');
    }

    //tabungan sukarela Neraca Percobaan
    public static function getSumTabunganSukarelaAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'40') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiTabunganSukarelaDebet(){ 
         $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'40') 
        ->sum('jumlah');
    }
    public static function getMutasiTabunganSukarelaKredit(){  
         $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'40') 
        ->sum('jumlah');
    }

    //simpanan berjangka Neraca Percobaan
    public static function getSumSimpananBerjangkaAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'69') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiSimpananBerjangkaDebet(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi'];  
        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'69') 
        ->sum('jumlah');
    }
    public static function getMutasiSimpananBerjangkaKredit(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'69') 
        ->sum('jumlah');
    }

    //Pinjaman di Bank Lain Neraca Percobaan
    public static function getSumPinjamanBankLainAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'72') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPinjamanBankLainDebet(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'72') 
        ->sum('jumlah');
    }
    public static function getMutasiPinjamanBankLainKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'72') 
        ->sum('jumlah');
    }

    //Kewajiban Lain Lain Neraca Percobaan
    public static function getSumKewajibanLainAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'81') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiKewajibanLainDebet(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'81') 
        ->sum('jumlah');
    }
    public static function getMutasiKewajibanLainKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'81') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumModalDisetorAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'74') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiModalDisetorDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'74') 
        ->sum('jumlah');
    }
    public static function getMutasiModalDisetorKredit(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'74') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumModalDonasiAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'75') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiModalDonasiDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'75') 
        ->sum('jumlah');
    }
    public static function getMutasiModalDonasiKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'75') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumCadanganUmumAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'76') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiCadanganUmumDebet(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'76') 
        ->sum('jumlah');
    }
    public static function getMutasiCadanganUmumKredit(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'76') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumCadKhususAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'77') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiCadKhususDebet(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'77') 
        ->sum('jumlah');
    }
    public static function getMutasiCadKhususKredit(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'77') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumCadRaguAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'78') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiCadRaguDebet(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'78') 
        ->sum('jumlah');
    }
    public static function getMutasiCadRaguKredit(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'78') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumPendapatanBungaNasabahAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'2') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPendapatanBungaNasabahDebet(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'2') 
        ->sum('jumlah');
    }
    public static function getMutasiPendapatanBungaNasabahKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'2') 
        ->sum('jumlah');
    }
    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumPendapatanBungaLainAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'3') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPendapatanBungaLainKredit(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'3') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumOngkosAdministrasiAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'5') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiOngkosAdministrasiDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'5') 
        ->sum('jumlah');
    }
    public static function getMutasiOngkosAdministrasiKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'5') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumPendapatanLainAWKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'4') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPendapatanLainDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'4') 
        ->sum('jumlah');
    }
    public static function getMutasiPendapatanLainKredit(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'4') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaBungaTabunganAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'30') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaBungaTabunganDebet(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'30') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaBungaTabunganKredit(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'30') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaBungaSimpananBerjangkaAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'31') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaBungaSimpananBerjangkaDebet(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'31') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaBungaSimpananBerjangkaKredit(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'31') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaBungaLainAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'32') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaBungaLainDebet(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'32') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaBungaLainKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'32') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaPegawaiAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'25') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaPegawaiDebet(){  
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'25') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaPegawaiKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'25') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaKantorAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'26') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaKantorDebet(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'26') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaKantorKredit(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'26') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaPerjalananAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'22') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaPerjalananDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'22') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaPerjalananKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'22') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaPenyusutanAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'27') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaPenyusutanDebet(){    
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'27') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaPenyusutanKredit(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi'];    

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'27') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaPinjamanRaguAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'28') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaPinjamanRaguDebet(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'28') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaPinjamanRaguKredit(){
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'28') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaLainAWDebet(){ 
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start'];

        $lastDayofPreviousMonth = $daterange['end'];
        
        // $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        // $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'29') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }

    public static function getBiayaLainAK_Debet(){   
        $daterange = DateRange::all()->first();
        $firstDayofPreviousMonth = $daterange['start_mutasi'];

        $lastDayofPreviousMonth = $daterange['end_mutasi']; 

        return $a=Transaksi::all()
        ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'29') 
        ->sum('jumlah');
    }
    
    public static function getPrive(){    
        return $a=Transaksi::all()
        ->where('no_akun_id', '==' ,'166') 
        ->sum('jumlah');
    }
    public static function getModalAwal(){    
        return $a=Transaksi::all()
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');
    }
}
