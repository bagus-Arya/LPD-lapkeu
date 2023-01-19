<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaksi;
use App\Models\DateRange;
use Carbon\Carbon;
use Auth;
use PDF;

class NeracaPercobaanController extends Controller
{

    public function setTanggal(Request $request){
        $validator = Validator::make($request->all(), [
            'start' => ['required'],
            'end' => ['required']
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'updateTanggal')
                    ->withInput()
                    ->with('updateId',1);
        }

        // Retrieve the validated input...
        $validated = $validator->validateWithBag('updateTanggal');

        DateRange::where('id',1)->update($validated);
        return redirect()->back()->with('successSetTanggal','Tanggal Berhasil Di Setting');
    }
    public function setTanggalMutasi(Request $request){
        $validator = Validator::make($request->all(), [
            'start_mutasi' => ['required'],
            'end_mutasi' => ['required']
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'updateTanggal')
                    ->withInput()
                    ->with('updateId',1);
        }

        // Retrieve the validated input...
        $validated = $validator->validateWithBag('updateTanggal');

        DateRange::where('id',1)->update($validated);
        return redirect()->back()->with('successSetTanggalMutasi','Tanggal Berhasil Di Setting');
    }

    public function pdfaktiva()
    {
                 // Aktiva
            $totalKas = 
                 Transaksi::getKas_AW_Debet() + 
                 Transaksi::getMutasiKasDebet() - 
                 Transaksi::getMutasiKasKredit();
             $totalGiro = (Transaksi::getBPD_Giro_AW_Debet() + 
                 Transaksi::getMutasiBPDGiroDebet()-
                 Transaksi::getMutasiBPDGiroKredit()) + 
                 (Transaksi::getSumBankLainGiroAWKredit()+
                 Transaksi::getMutasiBankLainGiroDebet()-
                 Transaksi::getMutasiBankLainGiroKredit());
             $totalTabungan = (Transaksi::getSumBPDTabunganAWDebet() + 
                 Transaksi::getMutasiBPDTabunganDebet()-
                 Transaksi::getMutasiBPDTabunganKredit()) + 
                 (Transaksi::getSumBankLainTabunganAWDebet()+
                 Transaksi::getMutasiBankLainTabunganDebet()-
                 Transaksi::getMutasiBankLainTabunganKredit());
             $totalDeposito = (Transaksi::getSumBPDDepositoAWDebet() + 
                 Transaksi::getMutasiBPDDepositoDebet()-
                 Transaksi::getMutasiBPDDepositoKredit()) + 
                 (Transaksi::getSumBankLainDepositoAWDebet()+
                 Transaksi::getMutasiBankLainDepositoDebet()-
                 Transaksi::getMutasiBankLainDepositoKredit());
             $totalPinjamanDiberikan = (Transaksi::getSumPinjamanBulananAWDebet() + 
                 Transaksi::getMutasiPinjamanBulananDebet()-
                 Transaksi::getMutasiPinjamanBulananKredit()) + 
                 (Transaksi::getSumPinjamanMusimanDebet()+
                 Transaksi::getMutasiPinjamanMusimanDebet()-
                 Transaksi::getMutasiPinjamanMusimanKredit());
             $totalPiutangRagu = Transaksi::getSumCadRaguAWKredit() + 
                 Transaksi::getMutasiCadRaguKredit();
             $totalHargaPerolehan = Transaksi::getSumHargaPerolehanAWDebet() + 
                 Transaksi::getMutasiHargaPerolehanDebet() - 
                 Transaksi::getMutasiHargaPerolehanKredit();
             $totalAkumulasiPenyusutan = Transaksi::getSumAkumulasiPenyusutanAWKredit() - 
                 Transaksi::getMutasiAkumulasiPenyusutanDebet() + 
                 Transaksi::getMutasiAkumulasiPenyusutanKredit();
             $totalRupaRupa = Transaksi::getSumAktivaLainAWDebet() + 
                 Transaksi::getMutasiAktivaLainDebet() - 
                 Transaksi::getMutasiAktivaLainKredit();
             $totalAktiva = $totalKas+$totalGiro+$totalTabungan+$totalDeposito+$totalPinjamanDiberikan+$totalPiutangRagu+$totalHargaPerolehan+$totalAkumulasiPenyusutan+$totalRupaRupa;
             
             // Pasiva
             $totalPTabungan = (Transaksi::getSumTabunganWajibAWKredit() - 
                 Transaksi::getMutasiTabunganWajibDebet()+
                 Transaksi::getMutasiTabunganWajibKreditt()) + 
                 (Transaksi::getSumTabunganSukarelaAWKredit()-
                 Transaksi::getMutasiTabunganSukarelaDebet()+
                 Transaksi::getMutasiTabunganSukarelaKredit());
             $totalPSimpananBerjangka = Transaksi::getSumSimpananBerjangkaAWKredit() - 
                 Transaksi::getMutasiSimpananBerjangkaDebet()+
                 Transaksi::getMutasiSimpananBerjangkaKredit();
             $totalPPinjamanDiterima = Transaksi::getSumPinjamanBankLainAWKredit() - 
                 Transaksi::getMutasiPinjamanBankLainDebet() + 
                 Transaksi::getMutasiPinjamanBankLainKredit();
             $totalPRupaPasiva = Transaksi::getSumKewajibanLainAWKredit() - 
                 Transaksi::getMutasiKewajibanLainDebet() + 
                 Transaksi::getMutasiKewajibanLainKredit();
             $totalPModalDisetor = (Transaksi::getSumModalDisetorAWKredit() - 
                 Transaksi::getMutasiModalDisetorDebet()+
                 Transaksi::getMutasiModalDisetorKredit()) + 
                 (Transaksi::getSumModalDonasiAWKredit()-
                 Transaksi::getMutasiModalDonasiDebet()+
                 Transaksi::getMutasiModalDonasiKredit());
             $totalPCadanganUmum = (Transaksi::getSumCadanganUmumAWKredit() - 
                 Transaksi::getMutasiCadanganUmumDebet()+
                 Transaksi::getMutasiCadanganUmumKredit()) + 
                 (Transaksi::getSumCadKhususAWKredit()-
                 Transaksi::getMutasiCadKhususDebet()+
                 Transaksi::getMutasiCadKhususKredit());
             $totalPLaba = $totalAktiva - ($totalPTabungan+$totalPSimpananBerjangka+$totalPPinjamanDiterima+$totalPRupaPasiva+$totalPModalDisetor+$totalPCadanganUmum);
             $totalPasiva = $totalPTabungan+$totalPSimpananBerjangka+$totalPPinjamanDiterima+$totalPRupaPasiva+$totalPModalDisetor+$totalPCadanganUmum+$totalPLaba;
             
        $pdf = PDF::loadView('pdflaporan.aktiva',
        [ 
            'totalKas' => $totalKas,
            'totalGiro' => $totalGiro,
            'totalTabungan' => $totalTabungan,
            'totalDeposito' => $totalDeposito,
            'totalPinjamanDiberikan' => $totalPinjamanDiberikan,
            'totalPiutangRagu' => $totalPiutangRagu,
            'totalHargaPerolehan' => $totalHargaPerolehan,
            'totalAkumulasiPenyusutan' => $totalAkumulasiPenyusutan,
            'totalRupaRupa' => $totalRupaRupa,
            'totalAktiva' => $totalAktiva,
            'totalPTabungan' => $totalPTabungan,
            'totalPSimpananBerjangka' => $totalPSimpananBerjangka,
            'totalPPinjamanDiterima' => $totalPPinjamanDiterima, 
            'totalPRupaPasiva' => $totalPRupaPasiva,
            'totalPModalDisetor' => $totalPModalDisetor,
            'totalPCadanganUmum' => $totalPCadanganUmum,
            'totalPLaba' => $totalPLaba,
            'totalPasiva' => $totalPasiva,
        ]
    )->setPaper('a3', 'landscape')->setWarnings(false);
    return $pdf->stream();
    }
    public function pdfpasiva()
    {
         // Aktiva
         $totalKas = 
         Transaksi::getKas_AW_Debet() + 
         Transaksi::getMutasiKasDebet() - 
         Transaksi::getMutasiKasKredit();
     $totalGiro = (Transaksi::getBPD_Giro_AW_Debet() + 
         Transaksi::getMutasiBPDGiroDebet()-
         Transaksi::getMutasiBPDGiroKredit()) + 
         (Transaksi::getSumBankLainGiroAWKredit()+
         Transaksi::getMutasiBankLainGiroDebet()-
         Transaksi::getMutasiBankLainGiroKredit());
     $totalTabungan = (Transaksi::getSumBPDTabunganAWDebet() + 
         Transaksi::getMutasiBPDTabunganDebet()-
         Transaksi::getMutasiBPDTabunganKredit()) + 
         (Transaksi::getSumBankLainTabunganAWDebet()+
         Transaksi::getMutasiBankLainTabunganDebet()-
         Transaksi::getMutasiBankLainTabunganKredit());
     $totalDeposito = (Transaksi::getSumBPDDepositoAWDebet() + 
         Transaksi::getMutasiBPDDepositoDebet()-
         Transaksi::getMutasiBPDDepositoKredit()) + 
         (Transaksi::getSumBankLainDepositoAWDebet()+
         Transaksi::getMutasiBankLainDepositoDebet()-
         Transaksi::getMutasiBankLainDepositoKredit());
     $totalPinjamanDiberikan = (Transaksi::getSumPinjamanBulananAWDebet() + 
         Transaksi::getMutasiPinjamanBulananDebet()-
         Transaksi::getMutasiPinjamanBulananKredit()) + 
         (Transaksi::getSumPinjamanMusimanDebet()+
         Transaksi::getMutasiPinjamanMusimanDebet()-
         Transaksi::getMutasiPinjamanMusimanKredit());
     $totalPiutangRagu = Transaksi::getSumCadRaguAWKredit() + 
         Transaksi::getMutasiCadRaguKredit();
     $totalHargaPerolehan = Transaksi::getSumHargaPerolehanAWDebet() + 
         Transaksi::getMutasiHargaPerolehanDebet() - 
         Transaksi::getMutasiHargaPerolehanKredit();
     $totalAkumulasiPenyusutan = Transaksi::getSumAkumulasiPenyusutanAWKredit() - 
         Transaksi::getMutasiAkumulasiPenyusutanDebet() + 
         Transaksi::getMutasiAkumulasiPenyusutanKredit();
     $totalRupaRupa = Transaksi::getSumAktivaLainAWDebet() + 
         Transaksi::getMutasiAktivaLainDebet() - 
         Transaksi::getMutasiAktivaLainKredit();
     $totalAktiva = $totalKas+$totalGiro+$totalTabungan+$totalDeposito+$totalPinjamanDiberikan+$totalPiutangRagu+$totalHargaPerolehan+$totalAkumulasiPenyusutan+$totalRupaRupa;
     
     // Pasiva
     $totalPTabungan = (Transaksi::getSumTabunganWajibAWKredit() - 
         Transaksi::getMutasiTabunganWajibDebet()+
         Transaksi::getMutasiTabunganWajibKreditt()) + 
         (Transaksi::getSumTabunganSukarelaAWKredit()-
         Transaksi::getMutasiTabunganSukarelaDebet()+
         Transaksi::getMutasiTabunganSukarelaKredit());
     $totalPSimpananBerjangka = Transaksi::getSumSimpananBerjangkaAWKredit() - 
         Transaksi::getMutasiSimpananBerjangkaDebet()+
         Transaksi::getMutasiSimpananBerjangkaKredit();
     $totalPPinjamanDiterima = Transaksi::getSumPinjamanBankLainAWKredit() - 
         Transaksi::getMutasiPinjamanBankLainDebet() + 
         Transaksi::getMutasiPinjamanBankLainKredit();
     $totalPRupaPasiva = Transaksi::getSumKewajibanLainAWKredit() - 
         Transaksi::getMutasiKewajibanLainDebet() + 
         Transaksi::getMutasiKewajibanLainKredit();
     $totalPModalDisetor = (Transaksi::getSumModalDisetorAWKredit() - 
         Transaksi::getMutasiModalDisetorDebet()+
         Transaksi::getMutasiModalDisetorKredit()) + 
         (Transaksi::getSumModalDonasiAWKredit()-
         Transaksi::getMutasiModalDonasiDebet()+
         Transaksi::getMutasiModalDonasiKredit());
     $totalPCadanganUmum = (Transaksi::getSumCadanganUmumAWKredit() - 
         Transaksi::getMutasiCadanganUmumDebet()+
         Transaksi::getMutasiCadanganUmumKredit()) + 
         (Transaksi::getSumCadKhususAWKredit()-
         Transaksi::getMutasiCadKhususDebet()+
         Transaksi::getMutasiCadKhususKredit());
     $totalPLaba = $totalAktiva - ($totalPTabungan+$totalPSimpananBerjangka+$totalPPinjamanDiterima+$totalPRupaPasiva+$totalPModalDisetor+$totalPCadanganUmum);
     $totalPasiva = $totalPTabungan+$totalPSimpananBerjangka+$totalPPinjamanDiterima+$totalPRupaPasiva+$totalPModalDisetor+$totalPCadanganUmum+$totalPLaba;
     
        $pdf = PDF::loadView('pdflaporan.pasiva',
        [ 
            'totalKas' => $totalKas,
            'totalGiro' => $totalGiro,
            'totalTabungan' => $totalTabungan,
            'totalDeposito' => $totalDeposito,
            'totalPinjamanDiberikan' => $totalPinjamanDiberikan,
            'totalPiutangRagu' => $totalPiutangRagu,
            'totalHargaPerolehan' => $totalHargaPerolehan,
            'totalAkumulasiPenyusutan' => $totalAkumulasiPenyusutan,
            'totalRupaRupa' => $totalRupaRupa,
            'totalAktiva' => $totalAktiva,
            'totalPTabungan' => $totalPTabungan,
            'totalPSimpananBerjangka' => $totalPSimpananBerjangka,
            'totalPPinjamanDiterima' => $totalPPinjamanDiterima, 
            'totalPRupaPasiva' => $totalPRupaPasiva,
            'totalPModalDisetor' => $totalPModalDisetor,
            'totalPCadanganUmum' => $totalPCadanganUmum,
            'totalPLaba' => $totalPLaba,
            'totalPasiva' => $totalPasiva,
        ]
    )->setPaper('a3', 'landscape')->setWarnings(false);
    return $pdf->stream();
    }
    public function pdfkas()
    {      
        // Pendapatan bunga nasabah 2
        $SumPendapatanBungaNasabahAWKredit  =Transaksi::getSumPendapatanBungaNasabahAWKredit();
        $MutasiPendapatanBungaNasabahDebet =Transaksi::getMutasiPendapatanBungaNasabahDebet();
        $MutasiPendapatanBungaNasabahKredit=Transaksi::getMutasiPendapatanBungaNasabahKredit();
        $totalPendapatanBunga = $SumPendapatanBungaNasabahAWKredit-$MutasiPendapatanBungaNasabahDebet+$MutasiPendapatanBungaNasabahKredit;
    
        // Pendapatan lain-lain 4
        $SumPendapatanLainAWKredit  =Transaksi::getSumPendapatanLainAWKredit();
        $MutasiPendapatanLainDebet =Transaksi::getMutasiPendapatanLainDebet();
        $MutasiPendapatanLainKredit=Transaksi::getMutasiPendapatanLainKredit();
        $totalPendapatanLain = $SumPendapatanLainAWKredit-$MutasiPendapatanLainDebet+$MutasiPendapatanLainKredit;
            
        // Biaya kantor 26
        $SumBiayaKantorAWDebet  =Transaksi::getSumBiayaKantorAWDebet();
        $MutasiBiayaKantorDebet =Transaksi::getMutasiBiayaKantorDebet();
        $MutasiBiayaKantorKredit=Transaksi::getMutasiBiayaKantorKredit();
        $totalBiayaKantor = $SumBiayaKantorAWDebet+$MutasiBiayaKantorDebet-$MutasiBiayaKantorKredit;

        // Biaya pegawai 25
        $SumBiayaPegawaiAWDebet  =Transaksi::getSumBiayaPegawaiAWDebet();
        $MutasiBiayaPegawaiDebet =Transaksi::getMutasiBiayaPegawaiDebet();
        $MutasiBiayaPegawaiKredit=Transaksi::getMutasiBiayaPegawaiKredit();
        $totalBiayaPegawai = $SumBiayaPegawaiAWDebet+$MutasiBiayaPegawaiDebet-$MutasiBiayaPegawaiKredit;

        // Biaya perjalanan 22
        $SumBiayaPerjalananAWDebet  =Transaksi::getSumBiayaPerjalananAWDebet();
        $MutasiBiayaPerjalananDebet =Transaksi::getMutasiBiayaPerjalananDebet();
        $totalBiayaPerjalanan = $SumBiayaPerjalananAWDebet+$MutasiBiayaPerjalananDebet;

        // Biaya penyusutan 27
        $SumBiayaPenyusutanAWDebet  =Transaksi::getSumBiayaPenyusutanAWDebet();
        $MutasiBiayaPenyusutanDebet =Transaksi::getMutasiBiayaPenyusutanDebet();
        $MutasiBiayaPenyusutanKredit=Transaksi::getMutasiBiayaPenyusutanKredit();
        $totalBiayaPenyusutan = $SumBiayaPenyusutanAWDebet+$MutasiBiayaPenyusutanDebet-$MutasiBiayaPenyusutanKredit;

        //  BiayaLainlain 29
        $SumBiayaLainAWDebet=Transaksi::getSumBiayaLainAWDebet();
        $BiayaLainAK_Debet=Transaksi::getBiayaLainAK_Debet();
        $totalBiayaLain = $SumBiayaLainAWDebet+$BiayaLainAK_Debet;
        
        $totalsimpananberjangka = Transaksi::getSumSimpananBerjangkaAWKredit() - 
            Transaksi::getMutasiSimpananBerjangkaDebet()+
            Transaksi::getMutasiSimpananBerjangkaKredit();
        $totalrupapasiva = Transaksi::getSumKewajibanLainAWKredit() - 
            Transaksi::getMutasiKewajibanLainDebet() + 
            Transaksi::getMutasiKewajibanLainKredit();
    
        // Modal Donasi 75
        $SumModalDonasiAWKredit  =Transaksi::getSumModalDonasiAWKredit();
        $MutasiModalDonasiDebet =Transaksi::getMutasiModalDonasiDebet();
        $MutasiModalDonasiKredit=Transaksi::getMutasiModalDonasiKredit();
        $totalModalDonasi = $SumModalDonasiAWKredit-$MutasiModalDonasiDebet+$MutasiModalDonasiKredit;

        $kasBersihOperasi = $totalPendapatanBunga+$totalPendapatanLain+$totalBiayaKantor+$totalBiayaPegawai+$totalBiayaPerjalanan+$totalBiayaPenyusutan+$totalBiayaLain;
    
        $aruskasAktivitasPendanaan = $totalsimpananberjangka+$totalrupapasiva+$totalModalDonasi;
        $aruskasAkhirPeriode = $aruskasAktivitasPendanaan+$kasBersihOperasi;

        $pdf = PDF::loadView('pdflaporan.aruskas',
        [ 
            'totalPendapatanBunga' => $totalPendapatanBunga,
            'totalPendapatanLain' => $totalPendapatanLain,
            'totalBiayaKantor' => $totalBiayaKantor,
            'totalBiayaPegawai' => $totalBiayaPegawai,
            'totalBiayaPerjalanan' => $totalBiayaPerjalanan,
            'totalBiayaPenyusutan' => $totalBiayaPenyusutan,
            'totalBiayaLain' => $totalBiayaLain,
            'totalsimpananberjangka' => $totalsimpananberjangka,
            'totalrupapasiva' => $totalrupapasiva,
            'totalModalDonasi' => $totalModalDonasi,
            'kasBersihOperasi' => $kasBersihOperasi,
            'aruskasAktivitasPendanaan' => $aruskasAktivitasPendanaan,
            'aruskasAkhirPeriode' => $aruskasAkhirPeriode,
        ]
    )->setPaper('a3', 'landscape')->setWarnings(false);
    return $pdf->stream();
    }
    public function pdfmodal()
    {   
        $totalPrive = Transaksi::getPrive();
        
        $totalKas = 
        Transaksi::getKas_AW_Debet() + 
        Transaksi::getMutasiKasDebet() - 
        Transaksi::getMutasiKasKredit();
        $totalGiro = (Transaksi::getBPD_Giro_AW_Debet() + 
        Transaksi::getMutasiBPDGiroDebet()-
        Transaksi::getMutasiBPDGiroKredit()) + 
        (Transaksi::getSumBankLainGiroAWKredit()+
        Transaksi::getMutasiBankLainGiroDebet()-
        Transaksi::getMutasiBankLainGiroKredit());
        $totalTabungan = (Transaksi::getSumBPDTabunganAWDebet() + 
        Transaksi::getMutasiBPDTabunganDebet()-
        Transaksi::getMutasiBPDTabunganKredit()) + 
        (Transaksi::getSumBankLainTabunganAWDebet()+
        Transaksi::getMutasiBankLainTabunganDebet()-
        Transaksi::getMutasiBankLainTabunganKredit());
        $totalDeposito = (Transaksi::getSumBPDDepositoAWDebet() + 
        Transaksi::getMutasiBPDDepositoDebet()-
        Transaksi::getMutasiBPDDepositoKredit()) + 
        (Transaksi::getSumBankLainDepositoAWDebet()+
        Transaksi::getMutasiBankLainDepositoDebet()-
        Transaksi::getMutasiBankLainDepositoKredit());
        $totalPinjamanDiberikan = (Transaksi::getSumPinjamanBulananAWDebet() + 
        Transaksi::getMutasiPinjamanBulananDebet()-
        Transaksi::getMutasiPinjamanBulananKredit()) + 
        (Transaksi::getSumPinjamanMusimanDebet()+
            Transaksi::getMutasiPinjamanMusimanDebet()-
            Transaksi::getMutasiPinjamanMusimanKredit());
        $totalPiutangRagu = Transaksi::getSumCadRaguAWKredit() + 
        Transaksi::getMutasiCadRaguKredit();
        $totalHargaPerolehan = Transaksi::getSumHargaPerolehanAWDebet() + 
        Transaksi::getMutasiHargaPerolehanDebet() - 
        Transaksi::getMutasiHargaPerolehanKredit();
        $totalAkumulasiPenyusutan = Transaksi::getSumAkumulasiPenyusutanAWKredit() - 
        Transaksi::getMutasiAkumulasiPenyusutanDebet() + 
        Transaksi::getMutasiAkumulasiPenyusutanKredit();
        $totalRupaRupa = Transaksi::getSumAktivaLainAWDebet() + 
        Transaksi::getMutasiAktivaLainDebet() - 
        Transaksi::getMutasiAktivaLainKredit();
        $totalAktiva = $totalKas+$totalGiro+$totalTabungan+$totalDeposito+$totalPinjamanDiberikan+$totalPiutangRagu+$totalHargaPerolehan+$totalAkumulasiPenyusutan+$totalRupaRupa;
        
        $totalPTabungan = (Transaksi::getSumTabunganWajibAWKredit() - 
        Transaksi::getMutasiTabunganWajibDebet()+
        Transaksi::getMutasiTabunganWajibKreditt()) + 
        (Transaksi::getSumTabunganSukarelaAWKredit()-
        Transaksi::getMutasiTabunganSukarelaDebet()+
        Transaksi::getMutasiTabunganSukarelaKredit());
        $totalPSimpananBerjangka = Transaksi::getSumSimpananBerjangkaAWKredit() - 
        Transaksi::getMutasiSimpananBerjangkaDebet()+
        Transaksi::getMutasiSimpananBerjangkaKredit();
        $totalPPinjamanDiterima = Transaksi::getSumPinjamanBankLainAWKredit() - 
        Transaksi::getMutasiPinjamanBankLainDebet() + 
        Transaksi::getMutasiPinjamanBankLainKredit();
        $totalPRupaPasiva = Transaksi::getSumKewajibanLainAWKredit() - 
        Transaksi::getMutasiKewajibanLainDebet() + 
        Transaksi::getMutasiKewajibanLainKredit();
        $totalPModalDisetor = (Transaksi::getSumModalDisetorAWKredit() - 
        Transaksi::getMutasiModalDisetorDebet()+
        Transaksi::getMutasiModalDisetorKredit()) + 
        (Transaksi::getSumModalDonasiAWKredit()-
        Transaksi::getMutasiModalDonasiDebet()+
        Transaksi::getMutasiModalDonasiKredit());
        $totalPCadanganUmum = (Transaksi::getSumCadanganUmumAWKredit() - 
        Transaksi::getMutasiCadanganUmumDebet()+
        Transaksi::getMutasiCadanganUmumKredit()) + 
        (Transaksi::getSumCadKhususAWKredit()-
        Transaksi::getMutasiCadKhususDebet()+
        Transaksi::getMutasiCadKhususKredit());

        $HasilBungaLainnyaBankLain=Transaksi::getSumPendapatanBungaLainAWKredit() + Transaksi::getMutasiPendapatanBungaLainKredit();
        $HasilBungaLainnyaPinjamanBukanBank=Transaksi::getSumPendapatanBungaNasabahAWKredit() - Transaksi::getMutasiPendapatanBungaNasabahDebet() + Transaksi::getMutasiPendapatanBungaNasabahKredit();
        $HasilBungaLainnyaBukanBank=Transaksi::getSumOngkosAdministrasiAWKredit() - Transaksi::getMutasiOngkosAdministrasiDebet() + Transaksi::getMutasiOngkosAdministrasiKredit();
        $PendapatanLainnya=Transaksi::getSumPendapatanLainAWKredit() - Transaksi::getMutasiPendapatanLainDebet() + Transaksi::getMutasiPendapatanLainKredit();
        
        $SimpananBerjangkaBukanBank=Transaksi::getSumBiayaBungaSimpananBerjangkaAWDebet() + Transaksi::getMutasiBiayaBungaSimpananBerjangkaDebet() - Transaksi::getMutasiBiayaBungaSimpananBerjangkaKredit();
        $TabunganBukanBank=Transaksi::getSumBiayaBungaTabunganAWDebet() + Transaksi::getMutasiBiayaBungaTabunganDebet() - Transaksi::getMutasiBiayaBungaTabunganKredit();
        $LainnyaBukanBank=Transaksi::getSumBiayaBungaLainAWDebet() + Transaksi::getMutasiBiayaBungaLainDebet() - Transaksi::getMutasiBiayaBungaLainKredit();
        $BiayaTenagaKerja=Transaksi::getSumBiayaPegawaiAWDebet() + Transaksi::getMutasiBiayaPegawaiDebet() - Transaksi::getMutasiBiayaPegawaiKredit();
        $PemeliharaanPerbaikan=Transaksi::getSumBiayaKantorAWDebet() + Transaksi::getMutasiBiayaKantorDebet() - Transaksi::getMutasiBiayaKantorKredit();
        $PenyusutanAktivitas=Transaksi::getSumBiayaPenyusutanAWDebet() + Transaksi::getMutasiBiayaPenyusutanDebet() - Transaksi::getMutasiBiayaPenyusutanKredit();
        $PenyusutanPiutang=Transaksi::getSumBiayaPinjamanRaguAWDebet() + Transaksi::getMutasiBiayaPinjamanRaguDebet() - Transaksi::getMutasiBiayaPinjamanRaguKredit();
        $BarangJasaPihakKetiga=Transaksi::getSumBiayaPerjalananAWDebet() + Transaksi::getMutasiBiayaPerjalananDebet() - Transaksi::getMutasiBiayaPerjalananKredit();
        $BiayaOperationalLain=Transaksi::getSumBiayaLainAWDebet() + Transaksi::getBiayaLainAK_Debet();
   
        $BiayaOperational= $SimpananBerjangkaBukanBank+$TabunganBukanBank+$LainnyaBukanBank+$BiayaTenagaKerja+$PemeliharaanPerbaikan+$PenyusutanAktivitas+$PenyusutanPiutang+$BarangJasaPihakKetiga+$BiayaOperationalLain;  
        $LabaNonDE = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $LabaNonED = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $PendapatanOperational = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $LabaOperationalAB = $PendapatanOperational-$BiayaOperational;
        $LabaTahunBerjalan = $LabaOperationalAB+$LabaNonDE;
        $labaBersih = $LabaTahunBerjalan;
        
        $modalAwal = Transaksi::getModalAwal() + $totalPModalDisetor;
        $total = $modalAwal + $labaBersih;
        $modalAkhir = $total - $totalPrive;

        $pdf = PDF::loadView('pdflaporan.modal',
        [ 
            'modalAwal' => $modalAwal,
            'labaBersih' => $labaBersih,
            'total' => $total,
            'totalPrive' => $totalPrive,
            'modalAkhir' => $modalAkhir, 
        ]
    )->setPaper('a3', 'landscape')->setWarnings(false);
    return $pdf->stream();
    }
    public function pdflaba()
    {
        $HasilBungaLainnyaBankLain=Transaksi::getSumPendapatanBungaLainAWKredit() + Transaksi::getMutasiPendapatanBungaLainKredit();
        $HasilBungaLainnyaPinjamanBukanBank=Transaksi::getSumPendapatanBungaNasabahAWKredit() - Transaksi::getMutasiPendapatanBungaNasabahDebet() + Transaksi::getMutasiPendapatanBungaNasabahKredit();
        $HasilBungaLainnyaBukanBank=Transaksi::getSumOngkosAdministrasiAWKredit() - Transaksi::getMutasiOngkosAdministrasiDebet() + Transaksi::getMutasiOngkosAdministrasiKredit();
        $PendapatanLainnya=Transaksi::getSumPendapatanLainAWKredit() - Transaksi::getMutasiPendapatanLainDebet() + Transaksi::getMutasiPendapatanLainKredit();
        
        $SimpananBerjangkaBukanBank=Transaksi::getSumBiayaBungaSimpananBerjangkaAWDebet() + Transaksi::getMutasiBiayaBungaSimpananBerjangkaDebet() - Transaksi::getMutasiBiayaBungaSimpananBerjangkaKredit();
        $TabunganBukanBank=Transaksi::getSumBiayaBungaTabunganAWDebet() + Transaksi::getMutasiBiayaBungaTabunganDebet() - Transaksi::getMutasiBiayaBungaTabunganKredit();
        $LainnyaBukanBank=Transaksi::getSumBiayaBungaLainAWDebet() + Transaksi::getMutasiBiayaBungaLainDebet() - Transaksi::getMutasiBiayaBungaLainKredit();
        $BiayaTenagaKerja=Transaksi::getSumBiayaPegawaiAWDebet() + Transaksi::getMutasiBiayaPegawaiDebet() - Transaksi::getMutasiBiayaPegawaiKredit();
        $PemeliharaanPerbaikan=Transaksi::getSumBiayaKantorAWDebet() + Transaksi::getMutasiBiayaKantorDebet() - Transaksi::getMutasiBiayaKantorKredit();
        $PenyusutanAktivitas=Transaksi::getSumBiayaPenyusutanAWDebet() + Transaksi::getMutasiBiayaPenyusutanDebet() - Transaksi::getMutasiBiayaPenyusutanKredit();
        $PenyusutanPiutang=Transaksi::getSumBiayaPinjamanRaguAWDebet() + Transaksi::getMutasiBiayaPinjamanRaguDebet() - Transaksi::getMutasiBiayaPinjamanRaguKredit();
        $BarangJasaPihakKetiga=Transaksi::getSumBiayaPerjalananAWDebet() + Transaksi::getMutasiBiayaPerjalananDebet() - Transaksi::getMutasiBiayaPerjalananKredit();
        $BiayaOperationalLain=Transaksi::getSumBiayaLainAWDebet() + Transaksi::getBiayaLainAK_Debet();
   
        $BiayaOperational= $SimpananBerjangkaBukanBank+$TabunganBukanBank+$LainnyaBukanBank+$BiayaTenagaKerja+$PemeliharaanPerbaikan+$PenyusutanAktivitas+$PenyusutanPiutang+$BarangJasaPihakKetiga+$BiayaOperationalLain;  
        $LabaNonDE = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $LabaNonED = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $PendapatanOperational = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $LabaOperationalAB = $PendapatanOperational-$BiayaOperational;
        $LabaTahunBerjalan = $LabaOperationalAB+$LabaNonDE;
        $Jumlahlaba = $LabaTahunBerjalan;

        $pdf = PDF::loadView('pdflaporan.labarugi',
        [ 
            'HasilBungaLainnyaBankLain' => $HasilBungaLainnyaBankLain,
            'HasilBungaLainnyaPinjamanBukanBank' => $HasilBungaLainnyaPinjamanBukanBank,
            'HasilBungaLainnyaBukanBank' => $HasilBungaLainnyaBukanBank,
            'PendapatanLainnya' => $PendapatanLainnya,
            'SimpananBerjangkaBukanBank' => $SimpananBerjangkaBukanBank,
            'TabunganBukanBank' => $TabunganBukanBank,
            'LainnyaBukanBank' => $LainnyaBukanBank,
            'BiayaTenagaKerja' => $BiayaTenagaKerja,
            'PemeliharaanPerbaikan' => $PemeliharaanPerbaikan,
            'PenyusutanAktivitas' => $PenyusutanAktivitas,
            'PenyusutanPiutang' => $PenyusutanPiutang,
            'BarangJasaPihakKetiga' => $BarangJasaPihakKetiga,
            'BiayaOperationalLain' => $BiayaOperationalLain,
            'BiayaOperational' => $BiayaOperational,
            'LabaOperationalAB' => $LabaOperationalAB,
            'LabaNonDE' => $LabaNonDE,
            'LabaNonED' => $LabaNonED,
            'LabaTahunBerjalan' => $LabaTahunBerjalan,
            'Jumlahlaba' => $Jumlahlaba,
            'PendapatanOperational' => $PendapatanOperational,
        ]
        )->setPaper('a3', 'landscape')->setWarnings(false);
        return $pdf->stream();
    }

    public function showPdf()
    {
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

        // Biaya pegawai 26
        $SumBiayaKantorAWDebet  =Transaksi::getSumBiayaKantorAWDebet();
        $MutasiBiayaKantorDebet =Transaksi::getMutasiBiayaKantorDebet();
        $MutasiBiayaKantorKredit=Transaksi::getMutasiBiayaKantorKredit();

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
        $SumBiayaLainAWDebet=Transaksi::getSumBiayaLainAWDebet();
        $BiayaLainAK_Debet=Transaksi::getBiayaLainAK_Debet();

        $TotalSaldoAwalDebet = $SumKasAWDebet+$SumBPDGiroAWDebet+$SumBPDTabunganAWDebet+$BPD_Deposito_AW_Debet+$SumBankLainGiroAWDebet+$SumBankLainTabunganAWDebet+$SumBankLainDepositoAWDebet+$SumPinjamanBulananAWDebet+$SumPinjamanMusimanAWDebet+$SumAktivaLainAWDebet+$SumHargaPerolehanAWDebet+$SumHargaPerolehanAWDebet+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit+$SumBiayaBungaTabunganAWDebet+$SumBiayaBungaSimpananBerjangkaAWDebet+$SumBiayaBungaLainAWDebet+$SumBiayaPegawaiAWDebet+$SumBiayaPerjalananAWDebet+$SumBiayaPenyusutanAWDebet+$SumBiayaPinjamanRaguAWDebet+$SumBiayaLainAWDebet;
        $TotalSaldoAwalKredit = $SumAkumulasiPenyusutanAWKredit+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit;
        $TotalMutasiDebet = $MutasiKasDebet+$MutasiBPDGiroDebet+$MutasiBPDTabunganDebet+$MutasiBPDDepositoDebet+$MutasiBankLainGiroDebet+$MutasiBankLainTabunganDebet+$MutasiBankLainDepositoDebet+$MutasiPinjamanBulananDebet+$MutasiPinjamanMusimanDebet+$MutasiHargaPerolehanDebet+$MutasiAkumulasiPenyusutanDebet+$MutasiAktivaLainDebet+$MutasiTabunganWajibDebet+$MutasiTabunganSukarelaDebet+$MutasiBiayaBungaTabunganDebet+$MutasiBiayaBungaSimpananBerjangkaDebet+$MutasiBiayaBungaLainDebet+$MutasiBiayaPegawaiDebet+$MutasiBiayaKantorDebet+$MutasiBiayaPerjalananDebet+$MutasiBiayaPenyusutanDebet+$MutasiBiayaPinjamanRaguDebet+$BiayaLainAK_Debet;
        $TotalMutasiKredit = $MutasiKasKredit+$MutasiBPDDepositoKredit+$MutasiBankLainGiroKredit+$MutasiBankLainTabunganKredit+$MutasiBankLainDepositoKredit+$MutasiPinjamanBulananKredit+$MutasiPinjamanMusimanKredit+$MutasiPendapatanBungaNasabahKredit+$MutasiPendapatanBungaLainKredit+$MutasiOngkosAdministrasiKredit+$MutasiPendapatanLainKredit;
        $TotalSaldoAkhirDebet = ($SumKasAWDebet + $MutasiKasDebet - $MutasiKasKredit)+($SumBPDGiroAWDebet + $MutasiBPDGiroDebet)+($SumBPDTabunganAWDebet+$MutasiBPDTabunganDebet)+($BPD_Deposito_AW_Debet + $MutasiBPDDepositoDebet - $MutasiBPDDepositoKredit)+($SumBankLainGiroAWDebet+$MutasiBankLainGiroDebet-$MutasiBankLainGiroKredit)+($SumBankLainTabunganAWDebet+$MutasiBankLainTabunganDebet-$MutasiBankLainTabunganKredit)+($SumBankLainDepositoAWDebet+$MutasiBankLainDepositoDebet-$MutasiBankLainDepositoKredit)+($SumPinjamanBulananAWDebet+$MutasiPinjamanBulananDebet-$MutasiPinjamanBulananKredit)+($SumPinjamanMusimanAWDebet+$MutasiPinjamanMusimanDebet-$MutasiPinjamanMusimanKredit)+($SumHargaPerolehanAWDebet+$MutasiHargaPerolehanDebet-$MutasiHargaPerolehanKredit)+($SumAktivaLainAWDebet+$MutasiAktivaLainDebet-$MutasiAktivaLainKredit)+($SumBiayaBungaTabunganAWDebet+$MutasiBiayaBungaTabunganDebet)+($SumBiayaBungaSimpananBerjangkaAWDebet+$MutasiBiayaBungaSimpananBerjangkaDebet )+($SumBiayaBungaLainAWDebet+$MutasiBiayaBungaLainDebet)+($SumBiayaPegawaiAWDebet+$MutasiBiayaPegawaiDebet )+($SumBiayaKantorAWDebet+$MutasiBiayaKantorDebet )+($SumBiayaPerjalananAWDebet+$MutasiBiayaPerjalananDebet )+($SumBiayaPenyusutanAWDebet+$MutasiBiayaPenyusutanDebet )+($SumBiayaPinjamanRaguAWDebet+$MutasiBiayaPinjamanRaguDebet)+($SumBiayaLainAWDebet+$BiayaLainAK_Debet);
        $TotalSaldoAkhirKredit = ($SumAkumulasiPenyusutanAWKredit-$MutasiAkumulasiPenyusutanDebet+$MutasiAkumulasiPenyusutanKredit)+($SumTabunganWajibAWKredit-$MutasiTabunganWajibDebet+$MutasiTabunganWajibKredit)+($SumTabunganSukarelaAWKredit-$MutasiTabunganSukarelaDebet+$MutasiTabunganSukarelaKredit)+($SumSimpananBerjangkaAWKredit)+($SumPinjamanBankLainAWKredit)+($SumKewajibanLainAWKredit)+($SumModalDisetorAWKredit)+($SumModalDonasiAWKredit)+($SumCadanganUmumAWKredit)+($SumCadKhususAWKredit)+($SumCadRaguAWKredit)+($SumPendapatanBungaNasabahAWKredit+$MutasiPendapatanBungaNasabahKredit)+($SumPendapatanBungaLainAWKredit+$MutasiPendapatanBungaLainKredit)+($SumOngkosAdministrasiAWKredit+$MutasiOngkosAdministrasiKredit)+($SumPendapatanLainAWKredit+$MutasiPendapatanLainKredit);
        
        $pdf = PDF::loadView('pdflaporan.pdf',
            [ 
                'MutasiKasKredit' => $MutasiKasKredit,
                'MutasiKasDebet' => $MutasiKasDebet,
                'SumKasAWDebet' => $SumKasAWDebet,
                'SumBPDGiroAWDebet' => $SumBPDGiroAWDebet,
                'MutasiBPDGiroDebet' => $MutasiBPDGiroDebet,
                'MutasiBPDGiroKredit' => $MutasiBPDGiroKredit,
                'SumBPDTabunganAWDebet' => $SumBPDTabunganAWDebet,
                'MutasiBPDTabunganDebet' => $MutasiBPDTabunganDebet,
                'MutasiBPDTabunganKredit' => $MutasiBPDTabunganKredit,
                'BPD_Deposito_AW_Debet' => $BPD_Deposito_AW_Debet,
                'MutasiBPDDepositoDebet' => $MutasiBPDDepositoDebet,
                'MutasiBPDDepositoKredit' => $MutasiBPDDepositoKredit,
                'SumBankLainGiroAWDebet' => $SumBankLainGiroAWDebet,
                'MutasiBankLainGiroDebet' => $MutasiBankLainGiroDebet,
                'MutasiBankLainGiroKredit' => $MutasiBankLainGiroKredit,
                'SumBankLainTabunganAWDebet' => $SumBankLainTabunganAWDebet,  
                'MutasiBankLainTabunganDebet' => $MutasiBankLainTabunganDebet,
                'MutasiBankLainTabunganKredit' => $MutasiBankLainTabunganKredit,
                'SumBankLainDepositoAWDebet' => $SumBankLainDepositoAWDebet,  
                'MutasiBankLainDepositoDebet' => $MutasiBankLainDepositoDebet, 
                'MutasiBankLainDepositoKredit' => $MutasiBankLainDepositoKredit,
                'SumPinjamanBulananAWDebet' => $SumPinjamanBulananAWDebet,  
                'MutasiPinjamanBulananDebet' => $MutasiPinjamanBulananDebet, 
                'MutasiPinjamanBulananKredit' => $MutasiPinjamanBulananKredit,
                'SumPinjamanMusimanAWDebet' => $SumPinjamanMusimanAWDebet,  
                'MutasiPinjamanMusimanDebet' => $MutasiPinjamanMusimanDebet, 
                'MutasiPinjamanMusimanKredit' => $MutasiPinjamanMusimanKredit,
                'SumHargaPerolehanAWDebet' => $SumHargaPerolehanAWDebet,  
                'MutasiHargaPerolehanDebet' => $MutasiHargaPerolehanDebet, 
                'MutasiHargaPerolehanKredit' => $MutasiHargaPerolehanKredit,
                'SumAkumulasiPenyusutanAWKredit' => $SumAkumulasiPenyusutanAWKredit,  
                'MutasiAkumulasiPenyusutanDebet' => $MutasiAkumulasiPenyusutanDebet, 
                'MutasiAkumulasiPenyusutanKredit' => $MutasiAkumulasiPenyusutanKredit,
                'SumAktivaLainAWDebet' => $SumAktivaLainAWDebet,
                'MutasiAktivaLainDebet' => $MutasiAktivaLainDebet,
                'MutasiAktivaLainKredit' => $MutasiAktivaLainKredit,
                'SumTabunganWajibAWKredit' => $SumTabunganWajibAWKredit,  
                'MutasiTabunganWajibDebet' => $MutasiTabunganWajibDebet, 
                'MutasiTabunganWajibKredit' => $MutasiTabunganWajibKredit,
                'SumTabunganSukarelaAWKredit' => $SumTabunganSukarelaAWKredit,  
                'MutasiTabunganSukarelaDebet' => $MutasiTabunganSukarelaDebet, 
                'MutasiTabunganSukarelaKredit' => $MutasiTabunganSukarelaKredit,
                'SumSimpananBerjangkaAWKredit' => $SumSimpananBerjangkaAWKredit,  
                'MutasiSimpananBerjangkaDebet' => $MutasiSimpananBerjangkaDebet, 
                'MutasiSimpananBerjangkaKredit' => $MutasiSimpananBerjangkaKredit,
                // 'SumPinjamandiBPDAWKredit',  
                // 'MutasiPinjamandiBPDDebet', 
                // 'MutasiPinjamandiBPDKredit',
                'SumPinjamanBankLainAWKredit' => $SumPinjamanBankLainAWKredit,  
                'MutasiPinjamanBankLainDebet' => $MutasiPinjamanBankLainDebet, 
                'MutasiPinjamanBankLainKredit' => $MutasiPinjamanBankLainKredit,
                'SumKewajibanLainAWKredit' => $SumKewajibanLainAWKredit,  
                'MutasiKewajibanLainDebet' => $MutasiKewajibanLainDebet, 
                'MutasiKewajibanLainKredit' => $MutasiKewajibanLainKredit,
                'SumModalDisetorAWKredit' => $SumModalDisetorAWKredit,  
                'MutasiModalDisetorDebet' => $MutasiModalDisetorDebet, 
                'MutasiModalDisetorKredit' => $MutasiModalDisetorKredit,
                'SumModalDonasiAWKredit' => $SumModalDonasiAWKredit,  
                'MutasiModalDonasiDebet' => $MutasiModalDonasiDebet, 
                'MutasiModalDonasiKredit' => $MutasiModalDonasiKredit,
                'SumCadanganUmumAWKredit' => $SumCadanganUmumAWKredit,  
                'MutasiCadanganUmumDebet' => $MutasiCadanganUmumDebet, 
                'MutasiCadanganUmumKredit' => $MutasiCadanganUmumKredit,
                'SumCadKhususAWKredit' => $SumCadKhususAWKredit,  
                'MutasiCadKhususDebet' => $MutasiCadKhususDebet, 
                'MutasiCadKhususKredit' => $MutasiCadKhususKredit,
                'SumCadRaguAWKredit' => $SumCadRaguAWKredit,  
                'MutasiCadRaguDebet' => $MutasiCadRaguDebet, 
                'MutasiCadRaguKredit' => $MutasiCadRaguKredit,
                'SumPendapatanBungaNasabahAWKredit' => $SumPendapatanBungaNasabahAWKredit,  
                'MutasiPendapatanBungaNasabahDebet' => $MutasiPendapatanBungaNasabahDebet, 
                'MutasiPendapatanBungaNasabahKredit' => $MutasiPendapatanBungaNasabahKredit,
                'SumPendapatanBungaLainAWKredit' => $SumPendapatanBungaLainAWKredit,  
                'MutasiPendapatanBungaLainKredit' => $MutasiPendapatanBungaLainKredit,
                'SumOngkosAdministrasiAWKredit' => $SumOngkosAdministrasiAWKredit,  
                'MutasiOngkosAdministrasiDebet' => $MutasiOngkosAdministrasiDebet, 
                'MutasiOngkosAdministrasiKredit' => $MutasiOngkosAdministrasiKredit,
                'SumPendapatanLainAWKredit' => $SumPendapatanLainAWKredit,  
                'MutasiPendapatanLainDebet' => $MutasiPendapatanLainDebet, 
                'MutasiPendapatanLainKredit' => $MutasiPendapatanLainKredit,
                'SumBiayaBungaTabunganAWDebet' => $SumBiayaBungaTabunganAWDebet,  
                'MutasiBiayaBungaTabunganDebet' => $MutasiBiayaBungaTabunganDebet, 
                'MutasiBiayaBungaTabunganKredit' => $MutasiBiayaBungaTabunganKredit,
                'SumBiayaBungaSimpananBerjangkaAWDebet' => $SumBiayaBungaSimpananBerjangkaAWDebet,  
                'MutasiBiayaBungaSimpananBerjangkaDebet' => $MutasiBiayaBungaSimpananBerjangkaDebet, 
                'MutasiBiayaBungaSimpananBerjangkaKredit' => $MutasiBiayaBungaSimpananBerjangkaKredit,
                'SumBiayaBungaLainAWDebet' => $SumBiayaBungaLainAWDebet,  
                'MutasiBiayaBungaLainDebet' => $MutasiBiayaBungaLainDebet, 
                'MutasiBiayaBungaLainKredit' => $MutasiBiayaBungaLainKredit,
                'SumBiayaPegawaiAWDebet' => $SumBiayaPegawaiAWDebet,  
                'MutasiBiayaPegawaiDebet' => $MutasiBiayaPegawaiDebet, 
                'MutasiBiayaPegawaiKredit' => $MutasiBiayaPegawaiKredit,
                'SumBiayaKantorAWDebet' => $SumBiayaKantorAWDebet,  
                'MutasiBiayaKantorDebet' => $MutasiBiayaKantorDebet, 
                'MutasiBiayaKantorKredit' => $MutasiBiayaKantorKredit,
                'SumBiayaPerjalananAWDebet' => $SumBiayaPerjalananAWDebet,  
                'MutasiBiayaPerjalananDebet' => $MutasiBiayaPerjalananDebet, 
                'MutasiBiayaPerjalananKredit' => $MutasiBiayaPerjalananKredit,
                'SumBiayaPenyusutanAWDebet' => $SumBiayaPenyusutanAWDebet,  
                'MutasiBiayaPenyusutanDebet' => $MutasiBiayaPenyusutanDebet, 
                'MutasiBiayaPenyusutanKredit' => $MutasiBiayaPenyusutanKredit,
                'SumBiayaPinjamanRaguAWDebet' => $SumBiayaPinjamanRaguAWDebet,  
                'MutasiBiayaPinjamanRaguDebet' => $MutasiBiayaPinjamanRaguDebet, 
                'MutasiBiayaPinjamanRaguKredit' => $MutasiBiayaPinjamanRaguKredit,
                'SumBiayaLainAWDebet' => $SumBiayaLainAWDebet,
                'BiayaLainAK_Debet' => $BiayaLainAK_Debet,
                'TotalSaldoAwalDebet' => $TotalSaldoAwalDebet,
                'TotalSaldoAwalKredit' => $TotalSaldoAwalKredit,
                'TotalMutasiDebet' => $TotalMutasiDebet,
                'TotalMutasiKredit' => $TotalMutasiKredit,
                'TotalSaldoAkhirDebet' => $TotalSaldoAkhirDebet,
                'TotalSaldoAkhirKredit' => $TotalSaldoAkhirKredit,
                'TotalSaldoAkhirKredit' => $TotalSaldoAkhirKredit,
            ]
        )->setPaper('a3', 'landscape')->setWarnings(false);
        return $pdf->stream();
    }

    // AK = Akhir ; AW = Awal 

    public function index(Request $request){

        $daterange = DateRange::all();
 
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

        // Biaya kantor 26
        $SumBiayaKantorAWDebet  =Transaksi::getSumBiayaKantorAWDebet();
        $MutasiBiayaKantorDebet =Transaksi::getMutasiBiayaKantorDebet();
        $MutasiBiayaKantorKredit=Transaksi::getMutasiBiayaKantorKredit();

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
        $SumBiayaLainAWDebet=Transaksi::getSumBiayaLainAWDebet();
        $BiayaLainAK_Debet=Transaksi::getBiayaLainAK_Debet();
            

        $TotalSaldoAwalDebet = $SumKasAWDebet+$SumBPDGiroAWDebet+$SumBPDTabunganAWDebet+$BPD_Deposito_AW_Debet+$SumBankLainGiroAWDebet+$SumBankLainTabunganAWDebet+$SumBankLainDepositoAWDebet+$SumPinjamanBulananAWDebet+$SumPinjamanMusimanAWDebet+$SumAktivaLainAWDebet+$SumHargaPerolehanAWDebet+$SumHargaPerolehanAWDebet+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit+$SumBiayaBungaTabunganAWDebet+$SumBiayaBungaSimpananBerjangkaAWDebet+$SumBiayaBungaLainAWDebet+$SumBiayaPegawaiAWDebet+$SumBiayaPerjalananAWDebet+$SumBiayaPenyusutanAWDebet+$SumBiayaPinjamanRaguAWDebet+$SumBiayaLainAWDebet;
        $TotalSaldoAwalKredit = $SumAkumulasiPenyusutanAWKredit+$SumTabunganWajibAWKredit+$SumTabunganSukarelaAWKredit+$SumSimpananBerjangkaAWKredit+$SumPinjamanBankLainAWKredit+$SumKewajibanLainAWKredit+$SumModalDisetorAWKredit+$SumModalDonasiAWKredit+$SumCadanganUmumAWKredit+$SumCadKhususAWKredit+$SumCadRaguAWKredit+$SumPendapatanBungaNasabahAWKredit+$SumPendapatanBungaLainAWKredit+$SumOngkosAdministrasiAWKredit+$SumPendapatanLainAWKredit;
        $TotalMutasiDebet = $MutasiKasDebet+$MutasiBPDGiroDebet+$MutasiBPDTabunganDebet+$MutasiBPDDepositoDebet+$MutasiBankLainGiroDebet+$MutasiBankLainTabunganDebet+$MutasiBankLainDepositoDebet+$MutasiPinjamanBulananDebet+$MutasiPinjamanMusimanDebet+$MutasiHargaPerolehanDebet+$MutasiAkumulasiPenyusutanDebet+$MutasiAktivaLainDebet+$MutasiTabunganWajibDebet+$MutasiTabunganSukarelaDebet+$MutasiBiayaBungaTabunganDebet+$MutasiBiayaBungaSimpananBerjangkaDebet+$MutasiBiayaBungaLainDebet+$MutasiBiayaPegawaiDebet+$MutasiBiayaKantorDebet+$MutasiBiayaPerjalananDebet+$MutasiBiayaPenyusutanDebet+$MutasiBiayaPinjamanRaguDebet+$BiayaLainAK_Debet;
        $TotalMutasiKredit = $MutasiKasKredit+$MutasiBPDDepositoKredit+$MutasiBankLainGiroKredit+$MutasiBankLainTabunganKredit+$MutasiBankLainDepositoKredit+$MutasiPinjamanBulananKredit+$MutasiPinjamanMusimanKredit+$MutasiPendapatanBungaNasabahKredit+$MutasiPendapatanBungaLainKredit+$MutasiOngkosAdministrasiKredit+$MutasiPendapatanLainKredit+$MutasiAkumulasiPenyusutanKredit;
        $TotalSaldoAkhirDebet = ($SumKasAWDebet + $MutasiKasDebet - $MutasiKasKredit)+($SumBPDGiroAWDebet + $MutasiBPDGiroDebet)+($SumBPDTabunganAWDebet+$MutasiBPDTabunganDebet)+($BPD_Deposito_AW_Debet + $MutasiBPDDepositoDebet - $MutasiBPDDepositoKredit)+($SumBankLainGiroAWDebet+$MutasiBankLainGiroDebet-$MutasiBankLainGiroKredit)+($SumBankLainTabunganAWDebet+$MutasiBankLainTabunganDebet-$MutasiBankLainTabunganKredit)+($SumBankLainDepositoAWDebet+$MutasiBankLainDepositoDebet-$MutasiBankLainDepositoKredit)+($SumPinjamanBulananAWDebet+$MutasiPinjamanBulananDebet-$MutasiPinjamanBulananKredit)+($SumPinjamanMusimanAWDebet+$MutasiPinjamanMusimanDebet-$MutasiPinjamanMusimanKredit)+($SumHargaPerolehanAWDebet+$MutasiHargaPerolehanDebet-$MutasiHargaPerolehanKredit)+($SumAktivaLainAWDebet+$MutasiAktivaLainDebet-$MutasiAktivaLainKredit)+($SumBiayaBungaTabunganAWDebet+$MutasiBiayaBungaTabunganDebet)+($SumBiayaBungaSimpananBerjangkaAWDebet+$MutasiBiayaBungaSimpananBerjangkaDebet )+($SumBiayaBungaLainAWDebet+$MutasiBiayaBungaLainDebet)+($SumBiayaPegawaiAWDebet+$MutasiBiayaPegawaiDebet )+($SumBiayaKantorAWDebet+$MutasiBiayaKantorDebet )+($SumBiayaPerjalananAWDebet+$MutasiBiayaPerjalananDebet )+($SumBiayaPenyusutanAWDebet+$MutasiBiayaPenyusutanDebet )+($SumBiayaPinjamanRaguAWDebet+$MutasiBiayaPinjamanRaguDebet)+($SumBiayaLainAWDebet+$BiayaLainAK_Debet);
        $TotalSaldoAkhirKredit = ($SumAkumulasiPenyusutanAWKredit-$MutasiAkumulasiPenyusutanDebet+$MutasiAkumulasiPenyusutanKredit)+($SumTabunganWajibAWKredit-$MutasiTabunganWajibDebet+$MutasiTabunganWajibKredit)+($SumTabunganSukarelaAWKredit-$MutasiTabunganSukarelaDebet+$MutasiTabunganSukarelaKredit)+($SumSimpananBerjangkaAWKredit)+($SumPinjamanBankLainAWKredit)+($SumKewajibanLainAWKredit)+($SumModalDisetorAWKredit)+($SumModalDonasiAWKredit)+($SumCadanganUmumAWKredit)+($SumCadKhususAWKredit)+($SumCadRaguAWKredit)+($SumPendapatanBungaNasabahAWKredit+$MutasiPendapatanBungaNasabahKredit)+($SumPendapatanBungaLainAWKredit+$MutasiPendapatanBungaLainKredit)+($SumOngkosAdministrasiAWKredit+$MutasiOngkosAdministrasiKredit)+($SumPendapatanLainAWKredit+$MutasiPendapatanLainKredit);

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
                'SumBiayaKantorAWDebet',  
                'MutasiBiayaKantorDebet', 
                'MutasiBiayaKantorKredit',
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
                'daterange'
            ));
    }

    public function neracabulanan(Request $request){

        // Aktiva
        $totalKas = 
            Transaksi::getKas_AW_Debet() + 
            Transaksi::getMutasiKasDebet() - 
            Transaksi::getMutasiKasKredit();
        $totalGiro = (Transaksi::getBPD_Giro_AW_Debet() + 
            Transaksi::getMutasiBPDGiroDebet()-
            Transaksi::getMutasiBPDGiroKredit()) + 
            (Transaksi::getSumBankLainGiroAWKredit()+
            Transaksi::getMutasiBankLainGiroDebet()-
            Transaksi::getMutasiBankLainGiroKredit());
        $totalTabungan = (Transaksi::getSumBPDTabunganAWDebet() + 
            Transaksi::getMutasiBPDTabunganDebet()-
            Transaksi::getMutasiBPDTabunganKredit()) + 
            (Transaksi::getSumBankLainTabunganAWDebet()+
            Transaksi::getMutasiBankLainTabunganDebet()-
            Transaksi::getMutasiBankLainTabunganKredit());
        $totalDeposito = (Transaksi::getSumBPDDepositoAWDebet() + 
            Transaksi::getMutasiBPDDepositoDebet()-
            Transaksi::getMutasiBPDDepositoKredit()) + 
            (Transaksi::getSumBankLainDepositoAWDebet()+
            Transaksi::getMutasiBankLainDepositoDebet()-
            Transaksi::getMutasiBankLainDepositoKredit());
        $totalPinjamanDiberikan = (Transaksi::getSumPinjamanBulananAWDebet() + 
            Transaksi::getMutasiPinjamanBulananDebet()-
            Transaksi::getMutasiPinjamanBulananKredit()) + 
            (Transaksi::getSumPinjamanMusimanDebet()+
            Transaksi::getMutasiPinjamanMusimanDebet()-
            Transaksi::getMutasiPinjamanMusimanKredit());
        $totalPiutangRagu = Transaksi::getSumCadRaguAWKredit() + 
            Transaksi::getMutasiCadRaguKredit();
        $totalHargaPerolehan = Transaksi::getSumHargaPerolehanAWDebet() + 
            Transaksi::getMutasiHargaPerolehanDebet() - 
            Transaksi::getMutasiHargaPerolehanKredit();
        $totalAkumulasiPenyusutan = Transaksi::getSumAkumulasiPenyusutanAWKredit() - 
            Transaksi::getMutasiAkumulasiPenyusutanDebet() + 
            Transaksi::getMutasiAkumulasiPenyusutanKredit();
        $totalRupaRupa = Transaksi::getSumAktivaLainAWDebet() + 
            Transaksi::getMutasiAktivaLainDebet() - 
            Transaksi::getMutasiAktivaLainKredit();
        $totalAktiva = $totalKas+$totalGiro+$totalTabungan+$totalDeposito+$totalPinjamanDiberikan+$totalPiutangRagu+$totalHargaPerolehan+$totalAkumulasiPenyusutan+$totalRupaRupa;
        
        // Pasiva
        $totalPTabungan = (Transaksi::getSumTabunganWajibAWKredit() - 
            Transaksi::getMutasiTabunganWajibDebet()+
            Transaksi::getMutasiTabunganWajibKreditt()) + 
            (Transaksi::getSumTabunganSukarelaAWKredit()-
            Transaksi::getMutasiTabunganSukarelaDebet()+
            Transaksi::getMutasiTabunganSukarelaKredit());
        $totalPSimpananBerjangka = Transaksi::getSumSimpananBerjangkaAWKredit() - 
            Transaksi::getMutasiSimpananBerjangkaDebet()+
            Transaksi::getMutasiSimpananBerjangkaKredit();
        $totalPPinjamanDiterima = Transaksi::getSumPinjamanBankLainAWKredit() - 
            Transaksi::getMutasiPinjamanBankLainDebet() + 
            Transaksi::getMutasiPinjamanBankLainKredit();
        $totalPRupaPasiva = Transaksi::getSumKewajibanLainAWKredit() - 
            Transaksi::getMutasiKewajibanLainDebet() + 
            Transaksi::getMutasiKewajibanLainKredit();
        $totalPModalDisetor = (Transaksi::getSumModalDisetorAWKredit() - 
            Transaksi::getMutasiModalDisetorDebet()+
            Transaksi::getMutasiModalDisetorKredit()) + 
            (Transaksi::getSumModalDonasiAWKredit()-
            Transaksi::getMutasiModalDonasiDebet()+
            Transaksi::getMutasiModalDonasiKredit());
        $totalPCadanganUmum = (Transaksi::getSumCadanganUmumAWKredit() - 
            Transaksi::getMutasiCadanganUmumDebet()+
            Transaksi::getMutasiCadanganUmumKredit()) + 
            (Transaksi::getSumCadKhususAWKredit()-
            Transaksi::getMutasiCadKhususDebet()+
            Transaksi::getMutasiCadKhususKredit());
        $totalPLaba = $totalAktiva - ($totalPTabungan+$totalPSimpananBerjangka+$totalPPinjamanDiterima+$totalPRupaPasiva+$totalPModalDisetor+$totalPCadanganUmum);
        $totalPasiva = $totalPTabungan+$totalPSimpananBerjangka+$totalPPinjamanDiterima+$totalPRupaPasiva+$totalPModalDisetor+$totalPCadanganUmum+$totalPLaba;
        
        return view('laporan/neraca',
            compact(
                'totalKas',
                'totalGiro',
                'totalTabungan',
                'totalDeposito',
                'totalPinjamanDiberikan',
                'totalPiutangRagu',
                'totalHargaPerolehan',
                'totalAkumulasiPenyusutan',
                'totalRupaRupa',
                'totalAktiva',
                'totalPTabungan',
                'totalPSimpananBerjangka',
                'totalPPinjamanDiterima', 
                'totalPRupaPasiva',
                'totalPModalDisetor',
                'totalPCadanganUmum',
                'totalPLaba',
                'totalPasiva',
            ));
    }

    public function labarugi(Request $request){
        
        $HasilBungaLainnyaBankLain=Transaksi::getSumPendapatanBungaLainAWKredit() + Transaksi::getMutasiPendapatanBungaLainKredit();
        $HasilBungaLainnyaPinjamanBukanBank=Transaksi::getSumPendapatanBungaNasabahAWKredit() - Transaksi::getMutasiPendapatanBungaNasabahDebet() + Transaksi::getMutasiPendapatanBungaNasabahKredit();
        $HasilBungaLainnyaBukanBank=Transaksi::getSumOngkosAdministrasiAWKredit() - Transaksi::getMutasiOngkosAdministrasiDebet() + Transaksi::getMutasiOngkosAdministrasiKredit();
        $PendapatanLainnya=Transaksi::getSumPendapatanLainAWKredit() - Transaksi::getMutasiPendapatanLainDebet() + Transaksi::getMutasiPendapatanLainKredit();
        
        $SimpananBerjangkaBukanBank=Transaksi::getSumBiayaBungaSimpananBerjangkaAWDebet() + Transaksi::getMutasiBiayaBungaSimpananBerjangkaDebet() - Transaksi::getMutasiBiayaBungaSimpananBerjangkaKredit();
        $TabunganBukanBank=Transaksi::getSumBiayaBungaTabunganAWDebet() + Transaksi::getMutasiBiayaBungaTabunganDebet() - Transaksi::getMutasiBiayaBungaTabunganKredit();
        $LainnyaBukanBank=Transaksi::getSumBiayaBungaLainAWDebet() + Transaksi::getMutasiBiayaBungaLainDebet() - Transaksi::getMutasiBiayaBungaLainKredit();
        $BiayaTenagaKerja=Transaksi::getSumBiayaPegawaiAWDebet() + Transaksi::getMutasiBiayaPegawaiDebet() - Transaksi::getMutasiBiayaPegawaiKredit();
        $PemeliharaanPerbaikan=Transaksi::getSumBiayaKantorAWDebet() + Transaksi::getMutasiBiayaKantorDebet() - Transaksi::getMutasiBiayaKantorKredit();
        $PenyusutanAktivitas=Transaksi::getSumBiayaPenyusutanAWDebet() + Transaksi::getMutasiBiayaPenyusutanDebet() - Transaksi::getMutasiBiayaPenyusutanKredit();
        $PenyusutanPiutang=Transaksi::getSumBiayaPinjamanRaguAWDebet() + Transaksi::getMutasiBiayaPinjamanRaguDebet() - Transaksi::getMutasiBiayaPinjamanRaguKredit();
        $BarangJasaPihakKetiga=Transaksi::getSumBiayaPerjalananAWDebet() + Transaksi::getMutasiBiayaPerjalananDebet() - Transaksi::getMutasiBiayaPerjalananKredit();
        $BiayaOperationalLain=Transaksi::getSumBiayaLainAWDebet() + Transaksi::getBiayaLainAK_Debet();
   
        $BiayaOperational= $SimpananBerjangkaBukanBank+$TabunganBukanBank+$LainnyaBukanBank+$BiayaTenagaKerja+$PemeliharaanPerbaikan+$PenyusutanAktivitas+$PenyusutanPiutang+$BarangJasaPihakKetiga+$BiayaOperationalLain;  
        $LabaNonDE = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $LabaNonED = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $PendapatanOperational = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $LabaOperationalAB = $PendapatanOperational-$BiayaOperational;
        $LabaTahunBerjalan = $LabaOperationalAB+$LabaNonDE;
        $Jumlahlaba = $LabaTahunBerjalan;

        return view('laporan/laba-rugi',
            compact(
                'HasilBungaLainnyaBankLain',
                'HasilBungaLainnyaPinjamanBukanBank',
                'HasilBungaLainnyaBukanBank',
                'PendapatanLainnya',
                'SimpananBerjangkaBukanBank',
                'TabunganBukanBank',
                'LainnyaBukanBank',
                'BiayaTenagaKerja',
                'PemeliharaanPerbaikan',
                'PenyusutanAktivitas',
                'PenyusutanPiutang',
                'BarangJasaPihakKetiga',
                'BiayaOperationalLain',
                'BiayaOperational',
                'LabaOperationalAB',
                'LabaNonDE',
                'LabaNonED',
                'LabaTahunBerjalan',
                'Jumlahlaba',
                'PendapatanOperational',
            ));
        }
    public function aruskas(Request $request){
            
        // Pendapatan bunga nasabah 2
        $SumPendapatanBungaNasabahAWKredit  =Transaksi::getSumPendapatanBungaNasabahAWKredit();
        $MutasiPendapatanBungaNasabahDebet =Transaksi::getMutasiPendapatanBungaNasabahDebet();
        $MutasiPendapatanBungaNasabahKredit=Transaksi::getMutasiPendapatanBungaNasabahKredit();
        $totalPendapatanBunga = $SumPendapatanBungaNasabahAWKredit-$MutasiPendapatanBungaNasabahDebet+$MutasiPendapatanBungaNasabahKredit;
    
        // Pendapatan lain-lain 4
        $SumPendapatanLainAWKredit  =Transaksi::getSumPendapatanLainAWKredit();
        $MutasiPendapatanLainDebet =Transaksi::getMutasiPendapatanLainDebet();
        $MutasiPendapatanLainKredit=Transaksi::getMutasiPendapatanLainKredit();
        $totalPendapatanLain = $SumPendapatanLainAWKredit-$MutasiPendapatanLainDebet+$MutasiPendapatanLainKredit;
            
        // Biaya kantor 26
        $SumBiayaKantorAWDebet  =Transaksi::getSumBiayaKantorAWDebet();
        $MutasiBiayaKantorDebet =Transaksi::getMutasiBiayaKantorDebet();
        $MutasiBiayaKantorKredit=Transaksi::getMutasiBiayaKantorKredit();
        $totalBiayaKantor = $SumBiayaKantorAWDebet+$MutasiBiayaKantorDebet-$MutasiBiayaKantorKredit;

        // Biaya pegawai 25
        $SumBiayaPegawaiAWDebet  =Transaksi::getSumBiayaPegawaiAWDebet();
        $MutasiBiayaPegawaiDebet =Transaksi::getMutasiBiayaPegawaiDebet();
        $MutasiBiayaPegawaiKredit=Transaksi::getMutasiBiayaPegawaiKredit();
        $totalBiayaPegawai = $SumBiayaPegawaiAWDebet+$MutasiBiayaPegawaiDebet-$MutasiBiayaPegawaiKredit;

        // Biaya perjalanan 22
        $SumBiayaPerjalananAWDebet  =Transaksi::getSumBiayaPerjalananAWDebet();
        $MutasiBiayaPerjalananDebet =Transaksi::getMutasiBiayaPerjalananDebet();
        $totalBiayaPerjalanan = $SumBiayaPerjalananAWDebet+$MutasiBiayaPerjalananDebet;

        // Biaya penyusutan 27
        $SumBiayaPenyusutanAWDebet  =Transaksi::getSumBiayaPenyusutanAWDebet();
        $MutasiBiayaPenyusutanDebet =Transaksi::getMutasiBiayaPenyusutanDebet();
        $MutasiBiayaPenyusutanKredit=Transaksi::getMutasiBiayaPenyusutanKredit();
        $totalBiayaPenyusutan = $SumBiayaPenyusutanAWDebet+$MutasiBiayaPenyusutanDebet-$MutasiBiayaPenyusutanKredit;

        //  BiayaLainlain 29
        $SumBiayaLainAWDebet=Transaksi::getSumBiayaLainAWDebet();
        $BiayaLainAK_Debet=Transaksi::getBiayaLainAK_Debet();
        $totalBiayaLain = $SumBiayaLainAWDebet+$BiayaLainAK_Debet;
        
        $totalsimpananberjangka = Transaksi::getSumSimpananBerjangkaAWKredit() - 
            Transaksi::getMutasiSimpananBerjangkaDebet()+
            Transaksi::getMutasiSimpananBerjangkaKredit();
        $totalrupapasiva = Transaksi::getSumKewajibanLainAWKredit() - 
            Transaksi::getMutasiKewajibanLainDebet() + 
            Transaksi::getMutasiKewajibanLainKredit();
    
        // Modal Donasi 75
        $SumModalDonasiAWKredit  =Transaksi::getSumModalDonasiAWKredit();
        $MutasiModalDonasiDebet =Transaksi::getMutasiModalDonasiDebet();
        $MutasiModalDonasiKredit=Transaksi::getMutasiModalDonasiKredit();
        $totalModalDonasi = $SumModalDonasiAWKredit-$MutasiModalDonasiDebet+$MutasiModalDonasiKredit;

        $kasBersihOperasi = $totalPendapatanBunga+$totalPendapatanLain+$totalBiayaKantor+$totalBiayaPegawai+$totalBiayaPerjalanan+$totalBiayaPenyusutan+$totalBiayaLain;
       
        $aruskasAktivitasPendanaan = $totalsimpananberjangka+$totalrupapasiva+$totalModalDonasi;
        $aruskasAkhirPeriode = $aruskasAktivitasPendanaan+$kasBersihOperasi;

        return view('laporan/arus-kas',
            compact(
                'totalPendapatanBunga',
                'totalPendapatanLain',
                'totalBiayaKantor',
                'totalBiayaPegawai',
                'totalBiayaPerjalanan',
                'totalBiayaPenyusutan',
                'totalBiayaLain',
                'totalsimpananberjangka',
                'totalrupapasiva',
                'totalModalDonasi',
                'kasBersihOperasi',
                'aruskasAktivitasPendanaan',
                'aruskasAkhirPeriode',
            ));
    }
    public function perubahanmodal(Request $request)
    {
        $totalPrive = Transaksi::getPrive();
        
        $totalKas = 
        Transaksi::getKas_AW_Debet() + 
        Transaksi::getMutasiKasDebet() - 
        Transaksi::getMutasiKasKredit();
        $totalGiro = (Transaksi::getBPD_Giro_AW_Debet() + 
        Transaksi::getMutasiBPDGiroDebet()-
        Transaksi::getMutasiBPDGiroKredit()) + 
        (Transaksi::getSumBankLainGiroAWKredit()+
        Transaksi::getMutasiBankLainGiroDebet()-
        Transaksi::getMutasiBankLainGiroKredit());
        $totalTabungan = (Transaksi::getSumBPDTabunganAWDebet() + 
        Transaksi::getMutasiBPDTabunganDebet()-
        Transaksi::getMutasiBPDTabunganKredit()) + 
        (Transaksi::getSumBankLainTabunganAWDebet()+
        Transaksi::getMutasiBankLainTabunganDebet()-
        Transaksi::getMutasiBankLainTabunganKredit());
        $totalDeposito = (Transaksi::getSumBPDDepositoAWDebet() + 
        Transaksi::getMutasiBPDDepositoDebet()-
        Transaksi::getMutasiBPDDepositoKredit()) + 
        (Transaksi::getSumBankLainDepositoAWDebet()+
        Transaksi::getMutasiBankLainDepositoDebet()-
        Transaksi::getMutasiBankLainDepositoKredit());
        $totalPinjamanDiberikan = (Transaksi::getSumPinjamanBulananAWDebet() + 
        Transaksi::getMutasiPinjamanBulananDebet()-
        Transaksi::getMutasiPinjamanBulananKredit()) + 
        (Transaksi::getSumPinjamanMusimanDebet()+
            Transaksi::getMutasiPinjamanMusimanDebet()-
            Transaksi::getMutasiPinjamanMusimanKredit());
        $totalPiutangRagu = Transaksi::getSumCadRaguAWKredit() + 
        Transaksi::getMutasiCadRaguKredit();
        $totalHargaPerolehan = Transaksi::getSumHargaPerolehanAWDebet() + 
        Transaksi::getMutasiHargaPerolehanDebet() - 
        Transaksi::getMutasiHargaPerolehanKredit();
        $totalAkumulasiPenyusutan = Transaksi::getSumAkumulasiPenyusutanAWKredit() - 
        Transaksi::getMutasiAkumulasiPenyusutanDebet() + 
        Transaksi::getMutasiAkumulasiPenyusutanKredit();
        $totalRupaRupa = Transaksi::getSumAktivaLainAWDebet() + 
        Transaksi::getMutasiAktivaLainDebet() - 
        Transaksi::getMutasiAktivaLainKredit();
        $totalAktiva = $totalKas+$totalGiro+$totalTabungan+$totalDeposito+$totalPinjamanDiberikan+$totalPiutangRagu+$totalHargaPerolehan+$totalAkumulasiPenyusutan+$totalRupaRupa;
        
        $totalPTabungan = (Transaksi::getSumTabunganWajibAWKredit() - 
        Transaksi::getMutasiTabunganWajibDebet()+
        Transaksi::getMutasiTabunganWajibKreditt()) + 
        (Transaksi::getSumTabunganSukarelaAWKredit()-
        Transaksi::getMutasiTabunganSukarelaDebet()+
        Transaksi::getMutasiTabunganSukarelaKredit());
        $totalPSimpananBerjangka = Transaksi::getSumSimpananBerjangkaAWKredit() - 
        Transaksi::getMutasiSimpananBerjangkaDebet()+
        Transaksi::getMutasiSimpananBerjangkaKredit();
        $totalPPinjamanDiterima = Transaksi::getSumPinjamanBankLainAWKredit() - 
        Transaksi::getMutasiPinjamanBankLainDebet() + 
        Transaksi::getMutasiPinjamanBankLainKredit();
        $totalPRupaPasiva = Transaksi::getSumKewajibanLainAWKredit() - 
        Transaksi::getMutasiKewajibanLainDebet() + 
        Transaksi::getMutasiKewajibanLainKredit();
        $totalPModalDisetor = (Transaksi::getSumModalDisetorAWKredit() - 
        Transaksi::getMutasiModalDisetorDebet()+
        Transaksi::getMutasiModalDisetorKredit()) + 
        (Transaksi::getSumModalDonasiAWKredit()-
        Transaksi::getMutasiModalDonasiDebet()+
        Transaksi::getMutasiModalDonasiKredit());
        $totalPCadanganUmum = (Transaksi::getSumCadanganUmumAWKredit() - 
        Transaksi::getMutasiCadanganUmumDebet()+
        Transaksi::getMutasiCadanganUmumKredit()) + 
        (Transaksi::getSumCadKhususAWKredit()-
        Transaksi::getMutasiCadKhususDebet()+
        Transaksi::getMutasiCadKhususKredit());

        $HasilBungaLainnyaBankLain=Transaksi::getSumPendapatanBungaLainAWKredit() + Transaksi::getMutasiPendapatanBungaLainKredit();
        $HasilBungaLainnyaPinjamanBukanBank=Transaksi::getSumPendapatanBungaNasabahAWKredit() - Transaksi::getMutasiPendapatanBungaNasabahDebet() + Transaksi::getMutasiPendapatanBungaNasabahKredit();
        $HasilBungaLainnyaBukanBank=Transaksi::getSumOngkosAdministrasiAWKredit() - Transaksi::getMutasiOngkosAdministrasiDebet() + Transaksi::getMutasiOngkosAdministrasiKredit();
        $PendapatanLainnya=Transaksi::getSumPendapatanLainAWKredit() - Transaksi::getMutasiPendapatanLainDebet() + Transaksi::getMutasiPendapatanLainKredit();
        
        $SimpananBerjangkaBukanBank=Transaksi::getSumBiayaBungaSimpananBerjangkaAWDebet() + Transaksi::getMutasiBiayaBungaSimpananBerjangkaDebet() - Transaksi::getMutasiBiayaBungaSimpananBerjangkaKredit();
        $TabunganBukanBank=Transaksi::getSumBiayaBungaTabunganAWDebet() + Transaksi::getMutasiBiayaBungaTabunganDebet() - Transaksi::getMutasiBiayaBungaTabunganKredit();
        $LainnyaBukanBank=Transaksi::getSumBiayaBungaLainAWDebet() + Transaksi::getMutasiBiayaBungaLainDebet() - Transaksi::getMutasiBiayaBungaLainKredit();
        $BiayaTenagaKerja=Transaksi::getSumBiayaPegawaiAWDebet() + Transaksi::getMutasiBiayaPegawaiDebet() - Transaksi::getMutasiBiayaPegawaiKredit();
        $PemeliharaanPerbaikan=Transaksi::getSumBiayaKantorAWDebet() + Transaksi::getMutasiBiayaKantorDebet() - Transaksi::getMutasiBiayaKantorKredit();
        $PenyusutanAktivitas=Transaksi::getSumBiayaPenyusutanAWDebet() + Transaksi::getMutasiBiayaPenyusutanDebet() - Transaksi::getMutasiBiayaPenyusutanKredit();
        $PenyusutanPiutang=Transaksi::getSumBiayaPinjamanRaguAWDebet() + Transaksi::getMutasiBiayaPinjamanRaguDebet() - Transaksi::getMutasiBiayaPinjamanRaguKredit();
        $BarangJasaPihakKetiga=Transaksi::getSumBiayaPerjalananAWDebet() + Transaksi::getMutasiBiayaPerjalananDebet() - Transaksi::getMutasiBiayaPerjalananKredit();
        $BiayaOperationalLain=Transaksi::getSumBiayaLainAWDebet() + Transaksi::getBiayaLainAK_Debet();
   
        $BiayaOperational= $SimpananBerjangkaBukanBank+$TabunganBukanBank+$LainnyaBukanBank+$BiayaTenagaKerja+$PemeliharaanPerbaikan+$PenyusutanAktivitas+$PenyusutanPiutang+$BarangJasaPihakKetiga+$BiayaOperationalLain;  
        $LabaNonDE = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $LabaNonED = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $PendapatanOperational = $HasilBungaLainnyaBankLain+$HasilBungaLainnyaPinjamanBukanBank+$HasilBungaLainnyaBukanBank+$PendapatanLainnya;
        $LabaOperationalAB = $PendapatanOperational-$BiayaOperational;
        $LabaTahunBerjalan = $LabaOperationalAB+$LabaNonDE;
        $labaBersih = $LabaTahunBerjalan;
        
        $modalAwal = Transaksi::getModalAwal() + $totalPModalDisetor;
        $total = $modalAwal + $labaBersih;
        $modalAkhir = $total - $totalPrive;
        
        return view('laporan/perubahan-modal',
        compact(
            'modalAwal',
            'labaBersih',
            'total',
            'totalPrive',
            'modalAkhir',
        ));
    }
    
}
