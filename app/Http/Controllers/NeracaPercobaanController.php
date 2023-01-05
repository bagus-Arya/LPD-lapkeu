<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;
use Auth;

class NeracaPercobaanController extends Controller
{

    // AK = Akhir ; AW = Awal 

    public function index(Request $request){

        // Kas
        $SumKasAWDebet=Transaksi::getKas_AW_Debet();
        $MutasiKasDebet=Transaksi::getMutasiKasDebet();
        $MutasiKasKredit=Transaksi::getMutasiKasKredit();

        // Bank BPD 
        //giro
        $SumBPDGiroAWDebet=Transaksi::getBPD_Giro_AW_Debet();
        $MutasiBPDGiroDebet=Transaksi::getMutasiBPDGiroDebet();
        $MutasiBPDGiroKredit=Transaksi::getMutasiBPDGiroKredit();

        //tabungan
        $SumBPDTabunganAWDebet=Transaksi::getSumBPDTabunganAWDebet();
        $MutasiBPDTabunganDebet=Transaksi::getMutasiBPDTabunganDebet();
        $MutasiBPDTabunganKredit=Transaksi::getMutasiBPDTabunganKredit();
        
        //deposito
        $BPD_Deposito_AW_Debet=Transaksi::getSumBPDDepositoAWDebet();
        $MutasiBPDDepositoDebet=Transaksi::getMutasiBPDDepositoDebet();
        $MutasiBPDDepositoKredit=Transaksi::getMutasiBPDDepositoKredit();

        // BankLembaga lain 
        // giro
        $SumBankLainGiroAWDebet=Transaksi::getMutasiBankLainGiroDebet();
        $MutasiBankLainGiroDebet=Transaksi::getMutasiBankLainGiroDebet();
        $MutasiBankLainGiroKredit=Transaksi::getMutasiBankLainGiroKredit();

        // tabungan
        $SumBankLainTabunganAWDebet  =Transaksi::getSumBankLainTabunganAWDebet();
        $MutasiBankLainTabunganDebet =Transaksi::getMutasiBankLainTabunganDebet();
        $MutasiBankLainTabunganKredit=Transaksi::getMutasiBankLainTabunganKredit();
        
        // deposito
        $SumBankLainDepositoAWDebet  =Transaksi::getSumBankLainDepositoAWDebet();
        $MutasiBankLainDepositoDebet =Transaksi::getMutasiBankLainDepositoDebet();
        $MutasiBankLainDepositoKredit=Transaksi::getMutasiBankLainDepositoKredit();
        
        // Pinjaman yg diberikan bulanan
        $SumPinjamanBulananAWDebet  =Transaksi::getSumPinjamanBulananAWDebet();
        $MutasiPinjamanBulananDebet =Transaksi::getMutasiPinjamanBulananDebet();
        $MutasiPinjamanBulananKredit=Transaksi::getMutasiPinjamanBulananKredit();
        
        // Pinjaman yg diberikan musiman
        $SumPinjamanMusimanAWDebet  =Transaksi::getSumPinjamanMusimanDebet();
        $MutasiPinjamanMusimanDebet =Transaksi::getMutasiPinjamanMusimanDebet();
        $MutasiPinjamanMusimanKredit=Transaksi::getMutasiPinjamanMusimanKredit();
        
        // Harga perolehan 19
        $SumHargaPerolehanAWDebet  =Transaksi::getSumHargaPerolehanAWDebet();
        $MutasiHargaPerolehanDebet =Transaksi::getMutasiHargaPerolehanDebet();
        $MutasiHargaPerolehanKredit=Transaksi::getMutasiHargaPerolehanKredit();

        // Akumulasi penyusutan 20
        $SumAkumulasiPenyusutanAWKredit  =Transaksi::getSumAkumulasiPenyusutanAWKredit();
        $MutasiAkumulasiPenyusutanDebet =Transaksi::getMutasiAkumulasiPenyusutanDebet();
        $MutasiAkumulasiPenyusutanKredit=Transaksi::getMutasiAkumulasiPenyusutanKredit();

        // Activa Lain Lain 82
        $SumAktivaLainAWDebet  =Transaksi::getSumAktivaLainAWDebet();
        $MutasiAktivaLainDebet =Transaksi::getMutasiAktivaLainDebet();
        $MutasiAktivaLainKredit=Transaksi::getMutasiAktivaLainKredit();

        // Tabungan Wajib 39
        $SumTabunganWajibAWKredit =Transaksi::getSumTabunganWajibAWKredit();
        $MutasiTabunganWajibDebet =Transaksi::getMutasiTabunganWajibDebet();
        $MutasiTabunganWajibKredit=Transaksi::getMutasiTabunganWajibKreditt();

        // Tabungan Sukarela 40
        $SumTabunganSukarelaAWKredit =Transaksi::getSumTabunganSukarelaAWKredit();
        $MutasiTabunganSukarelaDebet =Transaksi::getMutasiTabunganSukarelaDebet();
        $MutasiTabunganSukarelaKredit=Transaksi::getMutasiTabunganSukarelaKredit();

        // Simpanan berjangka 69
        $SumSimpananBerjangkaAWKredit =Transaksi::getSumSimpananBerjangkaAWKredit();
        $MutasiSimpananBerjangkaDebet =Transaksi::getMutasiSimpananBerjangkaDebet();
        $MutasiSimpananBerjangkaKredit=Transaksi::getMutasiSimpananBerjangkaKredit();

        // Pinjaman di BPD ^belum ada nomer Akun 
        // $SumPinjamandiBPDAWKredit  =Transaksi::getSumPinjamandiBPDAWKredit();
        // $MutasiPinjamandiBPDDebet =Transaksi::getMutasiPinjamandiBPDDebet();
        // $MutasiPinjamandiBPDKredit=Transaksi::getMutasiPinjamandiBPDKredit();

        // Pinjaman di Bank Lain 72
        $SumPinjamanBankLainAWKredit  =Transaksi::getSumPinjamanBankLainAWKredit();
        $MutasiPinjamanBankLainDebet =Transaksi::getMutasiPinjamanBankLainDebet();
        $MutasiPinjamanBankLainKredit=Transaksi::getMutasiPinjamanBankLainKredit();

        // Kewajiban Lain lain 81
        $SumKewajibanLainAWKredit  =Transaksi::getSumKewajibanLainAWKredit();
        $MutasiKewajibanLainDebet =Transaksi::getMutasiKewajibanLainDebet();
        $MutasiKewajibanLainKredit=Transaksi::getMutasiKewajibanLainKredit();

        // Modal Disetor 74
        $SumModalDisetorAWKredit  =Transaksi::getSumModalDisetorAWKredit();
        $MutasiModalDisetorDebet =Transaksi::getMutasiModalDisetorDebet();
        $MutasiModalDisetorKredit=Transaksi::getMutasiModalDisetorKredit();

        // Modal Donasi 75
        $SumModalDonasiAWKredit  =Transaksi::getSumModalDonasiAWKredit();
        $MutasiModalDonasiDebet =Transaksi::getMutasiModalDonasiDebet();
        $MutasiModalDonasiKredit=Transaksi::getMutasiModalDonasiKredit();

        // Cadangan umum 76
        $SumCadanganUmumAWKredit  =Transaksi::getSumCadanganUmumAWKredit();
        $MutasiCadanganUmumDebet =Transaksi::getMutasiCadanganUmumDebet();
        $MutasiCadanganUmumKredit=Transaksi::getMutasiCadanganUmumKredit();

        // Cad khusus/tujuan 77
        $SumCadKhususAWKredit  =Transaksi::getSumCadKhususAWKredit();
        $MutasiCadKhususDebet =Transaksi::getMutasiCadKhususDebet();
        $MutasiCadKhususKredit=Transaksi::getMutasiCadKhususKredit();

        // Cad Pinj.Ragu-Ragu 78
        $SumCadRaguAWKredit  =Transaksi::getSumCadRaguAWKredit();
        $MutasiCadRaguDebet =Transaksi::getMutasiCadRaguDebet();
        $MutasiCadRaguKredit=Transaksi::getMutasiCadRaguKredit();

        // Pendapatan bunga nasabah 2
        $SumPendapatanBungaNasabahAWKredit  =Transaksi::getSumPendapatanBungaNasabahAWKredit();
        $MutasiPendapatanBungaNasabahDebet =Transaksi::getMutasiPendapatanBungaNasabahDebet();
        $MutasiPendapatanBungaNasabahKredit=Transaksi::getMutasiPendapatanBungaNasabahKredit();

        // Pendapatan bunga lain-lain 3
        $SumPendapatanBungaLainAWKredit  =Transaksi::getSumPendapatanBungaLainAWKredit();
        $MutasiPendapatanBungaLainKredit=Transaksi::getMutasiPendapatanBungaLainKredit();

        // Ongkos Administrasi 5
        $SumOngkosAdministrasiAWKredit  =Transaksi::getSumOngkosAdministrasiAWKredit();
        $MutasiOngkosAdministrasiDebet =Transaksi::getMutasiOngkosAdministrasiDebet();
        $MutasiOngkosAdministrasiKredit=Transaksi::getMutasiOngkosAdministrasiKredit();

        // Pendapatan lain-lain 4
        $SumPendapatanLainAWKredit  =Transaksi::getSumPendapatanLainAWKredit();
        $MutasiPendapatanLainDebet =Transaksi::getMutasiPendapatanLainDebet();
        $MutasiPendapatanLainKredit=Transaksi::getMutasiPendapatanLainKredit();

        // Biaya bunga tabungan 30
        $SumBiayaBungaTabunganAWDebet  =Transaksi::getSumBiayaBungaTabunganAWDebet();
        $MutasiBiayaBungaTabunganDebet =Transaksi::getMutasiBiayaBungaTabunganDebet();
        $MutasiBiayaBungaTabunganKredit=Transaksi::getMutasiBiayaBungaTabunganKredit();

        // Biaya bunga simpanan berjangka 31
        $SumBiayaBungaSimpananBerjangkaAWDebet  =Transaksi::getSumBiayaBungaSimpananBerjangkaAWDebet();
        $MutasiBiayaBungaSimpananBerjangkaDebet =Transaksi::getMutasiBiayaBungaSimpananBerjangkaDebet();
        $MutasiBiayaBungaSimpananBerjangkaKredit=Transaksi::getMutasiBiayaBungaSimpananBerjangkaKredit();

        // Biaya bunga lain-lain 32
        $SumBiayaBungaLainAWDebet  =Transaksi::getSumBiayaBungaLainAWDebet();
        $MutasiBiayaBungaLainDebet =Transaksi::getMutasiBiayaBungaLainDebet();
        $MutasiBiayaBungaLainKredit=Transaksi::getMutasiBiayaBungaLainKredit();

        // Biaya pegawai 25
        $SumBiayaPegawaiAWDebet  =Transaksi::getSumBiayaPegawaiAWDebet();
        $MutasiBiayaPegawaiDebet =Transaksi::getMutasiBiayaPegawaiDebet();
        $MutasiBiayaPegawaiKredit=Transaksi::getMutasiBiayaPegawaiKredit();

        // Biaya perjalanan 22
        $SumBiayaPerjalananAWDebet  =Transaksi::getSumBiayaPerjalananAWDebet();
        $MutasiBiayaPerjalananDebet =Transaksi::getMutasiBiayaPerjalananDebet();
        $MutasiBiayaPerjalananKredit=Transaksi::getMutasiBiayaPerjalananKredit();

        // Biaya penyusutan 27
        $SumBiayaPenyusutanAWDebet  =Transaksi::getSumBiayaPenyusutanAWDebet();
        $MutasiBiayaPenyusutanDebet =Transaksi::getMutasiBiayaPenyusutanDebet();
        $MutasiBiayaPenyusutanKredit=Transaksi::getMutasiBiayaPenyusutanKredit();

        // Biaya pinjaman ragu-ragu 28
        $SumBiayaPinjamanRaguAWDebet  =Transaksi::getSumBiayaPinjamanRaguAWDebet();
        $MutasiBiayaPinjamanRaguDebet =Transaksi::getMutasiBiayaPinjamanRaguDebet();
        $MutasiBiayaPinjamanRaguKredit=Transaksi::getMutasiBiayaPinjamanRaguKredit();

        //  BiayaLainlain 29
        $BiayaLainAW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'29') 
            ->pluck('jumlah')
            ->toArray();
        $SumBiayaLainAWDebet = array_sum($BiayaLainAW_Debet);
        
        $BiayaLainAK_Debet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'29') 
        ->sum('jumlah');
            
        $TotalSaldoAwalDebet = $SumKasAWDebet+$SumBPDGiroAWDebet+$SumBPDTabunganAWDebet+$BPD_Deposito_AW_Debet+$SumBankLainGiroAWDebet+$SumBankLainTabunganAWDebet+$SumBankLainDepositoAWDebet+$SumPinjamanBulananAWDebet+$SumPinjamanMusimanAWDebet+$SumAktivaLainAWDebet+$SumHargaPerolehanAWDebet+$SumHargaPerolehanAWDebet+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit+$SumBiayaBungaTabunganAWDebet+$SumBiayaBungaSimpananBerjangkaAWDebet+$SumBiayaBungaLainAWDebet+$SumBiayaPegawaiAWDebet+$SumBiayaPerjalananAWDebet+$SumBiayaPenyusutanAWDebet+$SumBiayaPinjamanRaguAWDebet;
        $TotalSaldoAwalKredit = $SumKasAWDebet+$SumBPDGiroAWDebet+$SumBPDTabunganAWDebet+$BPD_Deposito_AW_Debet+$SumBankLainGiroAWDebet+$SumBankLainTabunganAWDebet+$SumBankLainDepositoAWDebet+$SumPinjamanBulananAWDebet+$SumPinjamanMusimanAWDebet+$SumAktivaLainAWDebet+$SumHargaPerolehanAWDebet+$SumHargaPerolehanAWDebet+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit+$SumBiayaBungaTabunganAWDebet+$SumBiayaBungaSimpananBerjangkaAWDebet+$SumBiayaBungaLainAWDebet+$SumBiayaPegawaiAWDebet+$SumBiayaPerjalananAWDebet+$SumBiayaPenyusutanAWDebet+$SumBiayaPinjamanRaguAWDebet;
        $TotalMutasiDebet = $SumKasAWDebet+$SumBPDGiroAWDebet+$SumBPDTabunganAWDebet+$BPD_Deposito_AW_Debet+$SumBankLainGiroAWDebet+$SumBankLainTabunganAWDebet+$SumBankLainDepositoAWDebet+$SumPinjamanBulananAWDebet+$SumPinjamanMusimanAWDebet+$SumAktivaLainAWDebet+$SumHargaPerolehanAWDebet+$SumHargaPerolehanAWDebet+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit+$SumBiayaBungaTabunganAWDebet+$SumBiayaBungaSimpananBerjangkaAWDebet+$SumBiayaBungaLainAWDebet+$SumBiayaPegawaiAWDebet+$SumBiayaPerjalananAWDebet+$SumBiayaPenyusutanAWDebet+$SumBiayaPinjamanRaguAWDebet;
        $TotalMutasiKredit = $SumKasAWDebet+$SumBPDGiroAWDebet+$SumBPDTabunganAWDebet+$BPD_Deposito_AW_Debet+$SumBankLainGiroAWDebet+$SumBankLainTabunganAWDebet+$SumBankLainDepositoAWDebet+$SumPinjamanBulananAWDebet+$SumPinjamanMusimanAWDebet+$SumAktivaLainAWDebet+$SumHargaPerolehanAWDebet+$SumHargaPerolehanAWDebet+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit+$SumBiayaBungaTabunganAWDebet+$SumBiayaBungaSimpananBerjangkaAWDebet+$SumBiayaBungaLainAWDebet+$SumBiayaPegawaiAWDebet+$SumBiayaPerjalananAWDebet+$SumBiayaPenyusutanAWDebet+$SumBiayaPinjamanRaguAWDebet;
        $TotalSaldoAkhirDebet = $SumKasAWDebet+$SumBPDGiroAWDebet+$SumBPDTabunganAWDebet+$BPD_Deposito_AW_Debet+$SumBankLainGiroAWDebet+$SumBankLainTabunganAWDebet+$SumBankLainDepositoAWDebet+$SumPinjamanBulananAWDebet+$SumPinjamanMusimanAWDebet+$SumAktivaLainAWDebet+$SumHargaPerolehanAWDebet+$SumHargaPerolehanAWDebet+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit+$SumBiayaBungaTabunganAWDebet+$SumBiayaBungaSimpananBerjangkaAWDebet+$SumBiayaBungaLainAWDebet+$SumBiayaPegawaiAWDebet+$SumBiayaPerjalananAWDebet+$SumBiayaPenyusutanAWDebet+$SumBiayaPinjamanRaguAWDebet;
        $TotalSaldoAkhirKredit = $SumKasAWDebet+$SumBPDGiroAWDebet+$SumBPDTabunganAWDebet+$BPD_Deposito_AW_Debet+$SumBankLainGiroAWDebet+$SumBankLainTabunganAWDebet+$SumBankLainDepositoAWDebet+$SumPinjamanBulananAWDebet+$SumPinjamanMusimanAWDebet+$SumAktivaLainAWDebet+$SumHargaPerolehanAWDebet+$SumHargaPerolehanAWDebet+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit+$SumBiayaBungaTabunganAWDebet+$SumBiayaBungaSimpananBerjangkaAWDebet+$SumBiayaBungaLainAWDebet+$SumBiayaPegawaiAWDebet+$SumBiayaPerjalananAWDebet+$SumBiayaPenyusutanAWDebet+$SumBiayaPinjamanRaguAWDebet;

        return view('laporan/neraca-percobaan',
            compact(
                'MutasiKasKredit',
                'MutasiKasDebet',
                'SumKasAWDebet',
                'SumBPDGiroAWDebet',
                'MutasiBPDGiroDebet',
                'MutasiBPDGiroKredit',
                'SumBPDTabunganAWDebet',
                'MutasiBPDTabunganDebet',
                'MutasiBPDTabunganKredit',
                'BPD_Deposito_AW_Debet',
                'MutasiBPDDepositoDebet',
                'MutasiBPDDepositoKredit',
                'SumBankLainGiroAWDebet',
                'MutasiBankLainGiroDebet',
                'MutasiBankLainGiroKredit',
                'SumBankLainTabunganAWDebet',  
                'MutasiBankLainTabunganDebet',
                'MutasiBankLainTabunganKredit',
                'SumBankLainDepositoAWDebet',  
                'MutasiBankLainDepositoDebet', 
                'MutasiBankLainDepositoKredit',
                'SumPinjamanBulananAWDebet',  
                'MutasiPinjamanBulananDebet', 
                'MutasiPinjamanBulananKredit',
                'SumPinjamanMusimanAWDebet',  
                'MutasiPinjamanMusimanDebet', 
                'MutasiPinjamanMusimanKredit',
                'SumHargaPerolehanAWDebet',  
                'MutasiHargaPerolehanDebet', 
                'MutasiHargaPerolehanKredit',
                'SumAkumulasiPenyusutanAWKredit',  
                'MutasiAkumulasiPenyusutanDebet', 
                'MutasiAkumulasiPenyusutanKredit',
                'SumAktivaLainAWDebet',
                'MutasiAktivaLainDebet',
                'MutasiAktivaLainKredit',
                'SumTabunganWajibAWKredit',  
                'MutasiTabunganWajibDebet', 
                'MutasiTabunganWajibKredit',
                'SumTabunganSukarelaAWKredit',  
                'MutasiTabunganSukarelaDebet', 
                'MutasiTabunganSukarelaKredit',
                'SumSimpananBerjangkaAWKredit',  
                'MutasiSimpananBerjangkaDebet', 
                'MutasiSimpananBerjangkaKredit',
                // 'SumPinjamandiBPDAWKredit',  
                // 'MutasiPinjamandiBPDDebet', 
                // 'MutasiPinjamandiBPDKredit',
                'SumPinjamanBankLainAWKredit',  
                'MutasiPinjamanBankLainDebet', 
                'MutasiPinjamanBankLainKredit',
                'SumKewajibanLainAWKredit',  
                'MutasiKewajibanLainDebet', 
                'MutasiKewajibanLainKredit',
                'SumModalDisetorAWKredit',  
                'MutasiModalDisetorDebet', 
                'MutasiModalDisetorKredit',
                'SumModalDonasiAWKredit',  
                'MutasiModalDonasiDebet', 
                'MutasiModalDonasiKredit',
                'SumCadanganUmumAWKredit',  
                'MutasiCadanganUmumDebet', 
                'MutasiCadanganUmumKredit',
                'SumCadKhususAWKredit',  
                'MutasiCadKhususDebet', 
                'MutasiCadKhususKredit',
                'SumCadRaguAWKredit',  
                'MutasiCadRaguDebet', 
                'MutasiCadRaguKredit',
                'SumPendapatanBungaNasabahAWKredit',  
                'MutasiPendapatanBungaNasabahDebet', 
                'MutasiPendapatanBungaNasabahKredit',
                'SumPendapatanBungaLainAWKredit',  
                'MutasiPendapatanBungaLainKredit',
                'SumOngkosAdministrasiAWKredit',  
                'MutasiOngkosAdministrasiDebet', 
                'MutasiOngkosAdministrasiKredit',
                'SumPendapatanLainAWKredit',  
                'MutasiPendapatanLainDebet', 
                'MutasiPendapatanLainKredit',
                'SumBiayaBungaTabunganAWDebet',  
                'MutasiBiayaBungaTabunganDebet', 
                'MutasiBiayaBungaTabunganKredit',
                'SumBiayaBungaSimpananBerjangkaAWDebet',  
                'MutasiBiayaBungaSimpananBerjangkaDebet', 
                'MutasiBiayaBungaSimpananBerjangkaKredit',
                'SumBiayaBungaLainAWDebet',  
                'MutasiBiayaBungaLainDebet', 
                'MutasiBiayaBungaLainKredit',
                'SumBiayaPegawaiAWDebet',  
                'MutasiBiayaPegawaiDebet', 
                'MutasiBiayaPegawaiKredit',
                'SumBiayaPerjalananAWDebet',  
                'MutasiBiayaPerjalananDebet', 
                'MutasiBiayaPerjalananKredit',
                'SumBiayaPenyusutanAWDebet',  
                'MutasiBiayaPenyusutanDebet', 
                'MutasiBiayaPenyusutanKredit',
                'SumBiayaPinjamanRaguAWDebet',  
                'MutasiBiayaPinjamanRaguDebet', 
                'MutasiBiayaPinjamanRaguKredit',
                'SumBiayaLainAWDebet',
                'BiayaLainAK_Debet',
                'TotalSaldoAwalDebet',
                'TotalSaldoAwalKredit',
                'TotalMutasiDebet',
                'TotalMutasiKredit',
                'TotalSaldoAkhirDebet',
                'TotalSaldoAkhirKredit',
                'TotalSaldoAkhirKredit',
            ));
    }

    public function neracabulanan(Request $request){

        $totalKas = Transaksi::getKas_AW_Debet() + Transaksi::getMutasiKasDebet() - Transaksi::getMutasiKasKredit();

        return view('laporan/neraca',
            compact(
                'totalKas'
            ));
    }

    public function labarugi(Request $request){

        $PendapatanBungaLainSaldoAkhirKredit=Transaksi::getKas_AW_Debet() + Transaksi::getMutasiKasDebet() - Transaksi::getMutasiKasKredit();
        $PendapatanBungaNasabahSaldoAkhirKredit=Transaksi::getKas_AW_Debet() + Transaksi::getMutasiKasDebet() - Transaksi::getMutasiKasKredit();

        return view('laporan/laba-rugi',
            compact(
                'PendapatanBungaLainSaldoAkhirKredit',
                'PendapatanBungaNasabahSaldoAkhirKredit',
            ));
    }

}
