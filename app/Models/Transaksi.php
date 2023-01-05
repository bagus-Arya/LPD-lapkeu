<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        return $MutasiKasKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');
    }

    public static function getMutasiKasDebet(){
        return $MutasiKasDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');
    }

    public static function getKas_AW_Debet(){
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();

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
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();

        $BPD_Giro_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'7') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBPDGiroAWDebet = array_sum($BPD_Giro_AW_Debet);
    }

    public static function getMutasiBPDGiroDebet(){
        return $MutasiBPDGiroDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'7') 
        ->sum('jumlah');
    }

    public static function getMutasiBPDGiroKredit(){    
        return $MutasiBPDGiroKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'7') 
        ->sum('jumlah');
    }

    // Bank BPD Tabungan Neraca Percobaan
    public static function getSumBPDTabunganAWDebet(){
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
    
        $BPD_Tabungan_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'8') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBPDTabunganAWDebet = array_sum($BPD_Tabungan_AW_Debet);
    }
    public static function getMutasiBPDTabunganDebet(){    
        return $MutasiBPDTabunganDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'8') 
        ->sum('jumlah');
    }
    public static function getMutasiBPDTabunganKredit(){    
        return $MutasiBPDTabunganKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'8') 
        ->sum('jumlah');
    }

    // Bank BPD Deposito Neraca Percobaan
    public static function getSumBPDDepositoAWDebet(){  
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
  
        $BPD_Deposito_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'9') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBPDDepositoAWDebet = array_sum($BPD_Deposito_AW_Debet);
    }
    public static function getMutasiBPDDepositoDebet(){    
        return $MutasiBPDDepositoDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'9') 
        ->sum('jumlah');
    }
    public static function getMutasiBPDDepositoKredit(){    
        return $MutasiBPDDepositoKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'9') 
        ->sum('jumlah');
    }

    // Bank BPD lembaga lain giro Neraca Percobaan
    public static function getSumBankLainGiroAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
   
        $Biaya_PegawaiAW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'10') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBankLainGiroAWDebet = array_sum($Biaya_PegawaiAW_Debet);
    }
    public static function getMutasiBankLainGiroDebet(){    
        return $MutasiBankLainGiroDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'10') 
        ->sum('jumlah');
    }
    public static function getMutasiBankLainGiroKredit(){    
        return $MutasiBankLainGiroKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'10') 
        ->sum('jumlah');
    }

    // Bank BPD lembaga lain tabungan Neraca Percobaan
    public static function getSumBankLainTabunganAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
   
        $Biaya_PegawaiAW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'11') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBankLainGiroAWDebet = array_sum($Biaya_PegawaiAW_Debet);
    }
    public static function getMutasiBankLainTabunganDebet(){    
        return $MutasiBankLainGiroDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'11') 
        ->sum('jumlah');
    }
    public static function getMutasiBankLainTabunganKredit(){    
        return $MutasiBankLainGiroKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'11') 
        ->sum('jumlah');
    }

    // Bank BPD lembaga lain deposito Neraca Percobaan
    public static function getSumBankLainDepositoAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $Biaya_PegawaiAW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'12') 
            ->pluck('jumlah')
            ->toArray();
        return $SumBankLainGiroAWDebet = array_sum($Biaya_PegawaiAW_Debet);
    }
    public static function getMutasiBankLainDepositoDebet(){    
        return $MutasiBankLainGiroDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'12') 
        ->sum('jumlah');
    }
    public static function getMutasiBankLainDepositoKredit(){    
        return $MutasiBankLainGiroKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'12') 
        ->sum('jumlah');
    }

    // Pinjaman Bulanan Neraca Percobaan
    public static function getSumPinjamanBulananAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'16') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPinjamanBulananDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'16') 
        ->sum('jumlah');
    }
    public static function getMutasiPinjamanBulananKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'16') 
        ->sum('jumlah');
    }

    // Pinjaman Musiman Neraca Percobaan
    public static function getSumPinjamanMusimanDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'17') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPinjamanMusimanDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'17') 
        ->sum('jumlah');
    }
    public static function getMutasiPinjamanMusimanKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'17') 
        ->sum('jumlah');
    }

    // belm di edit No_akun_id
    // Harga Perolehan Neraca Percobaan
    public static function getSumHargaPerolehanAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'19') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiHargaPerolehanDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'19') 
        ->sum('jumlah');
    }
    public static function getMutasiHargaPerolehanKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'19') 
        ->sum('jumlah');
    }

    // akumulasi penyusutan Neraca Percobaan
    public static function getSumAkumulasiPenyusutanAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'82') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiAkumulasiPenyusutanDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'82') 
        ->sum('jumlah');
    }
    public static function getMutasiAkumulasiPenyusutanKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'82') 
        ->sum('jumlah');
    }
    
    //aktiva lain - lain Neraca Percobaan
    public static function getSumAktivaLainAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'82') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiAktivaLainDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'82') 
        ->sum('jumlah');
    }
    public static function getMutasiAktivaLainKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'82') 
        ->sum('jumlah');
    }

    //tabungan Wajib Neraca Percobaan
    public static function getSumTabunganWajibAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'39') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiTabunganWajibDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'39') 
        ->sum('jumlah');
    }
    public static function getMutasiTabunganWajibKreditt(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'39') 
        ->sum('jumlah');
    }

    //tabungan sukarela Neraca Percobaan
    public static function getSumTabunganSukarelaAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'40') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiTabunganSukarelaDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'40') 
        ->sum('jumlah');
    }
    public static function getMutasiTabunganSukarelaKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'40') 
        ->sum('jumlah');
    }

    //simpanan berjangka Neraca Percobaan
    public static function getSumSimpananBerjangkaAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'69') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiSimpananBerjangkaDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'69') 
        ->sum('jumlah');
    }
    public static function getMutasiSimpananBerjangkaKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'69') 
        ->sum('jumlah');
    }

    //Pinjaman di Bank Lain Neraca Percobaan
    public static function getSumPinjamanBankLainAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'72') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPinjamanBankLainDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'72') 
        ->sum('jumlah');
    }
    public static function getMutasiPinjamanBankLainKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'72') 
        ->sum('jumlah');
    }

    //Kewajiban Lain Lain Neraca Percobaan
    public static function getSumKewajibanLainAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'81') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiKewajibanLainDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'81') 
        ->sum('jumlah');
    }
    public static function getMutasiKewajibanLainKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'81') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumModalDisetorAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'74') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiModalDisetorDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'74') 
        ->sum('jumlah');
    }
    public static function getMutasiModalDisetorKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'74') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumModalDonasiAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'75') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiModalDonasiDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'75') 
        ->sum('jumlah');
    }
    public static function getMutasiModalDonasiKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'75') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumCadanganUmumAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'76') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiCadanganUmumDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'76') 
        ->sum('jumlah');
    }
    public static function getMutasiCadanganUmumKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'76') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumCadKhususAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'77') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiCadKhususDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'77') 
        ->sum('jumlah');
    }
    public static function getMutasiCadKhususKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'77') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumCadRaguAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'78') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiCadRaguDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'78') 
        ->sum('jumlah');
    }
    public static function getMutasiCadRaguKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'78') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumPendapatanBungaNasabahAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'2') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPendapatanBungaNasabahDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'2') 
        ->sum('jumlah');
    }
    public static function getMutasiPendapatanBungaNasabahKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'2') 
        ->sum('jumlah');
    }
    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumPendapatanBungaLainAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'3') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPendapatanBungaLainKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'3') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumOngkosAdministrasiAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'5') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiOngkosAdministrasiDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'5') 
        ->sum('jumlah');
    }
    public static function getMutasiOngkosAdministrasiKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'5') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumPendapatanLainAWKredit(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'4') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiPendapatanLainDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'4') 
        ->sum('jumlah');
    }
    public static function getMutasiPendapatanLainKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'4') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaBungaTabunganAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'30') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaBungaTabunganDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'30') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaBungaTabunganKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'30') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaBungaSimpananBerjangkaAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'31') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaBungaSimpananBerjangkaDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'31') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaBungaSimpananBerjangkaKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'31') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaBungaLainAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'31') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaBungaLainDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'31') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaBungaLainKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'31') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaPegawaiAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'25') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaPegawaiDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'25') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaPegawaiKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'25') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaPerjalananAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'22') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaPerjalananDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'22') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaPerjalananKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'22') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaPenyusutanAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'27') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaPenyusutanDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'27') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaPenyusutanKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'27') 
        ->sum('jumlah');
    }

    //getSumModalDisetorAWKredit Neraca Percobaan
    public static function getSumBiayaPinjamanRaguAWDebet(){ 
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $a=Transaksi::all()
            ->whereBetween('tgl_transaksi', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'28') 
            ->pluck('jumlah')
            ->toArray();
        return $c = array_sum($a);
    }
    public static function getMutasiBiayaPinjamanRaguDebet(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'28') 
        ->sum('jumlah');
    }
    public static function getMutasiBiayaPinjamanRaguKredit(){    
        return $a=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'28') 
        ->sum('jumlah');
    }

}
