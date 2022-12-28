<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;

class NeracaPercobaanController extends Controller
{

    // AK = Akhir ; AW = Awal 

    public function index(Request $request){

        // Kas
        $Kas_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'6') 
            ->pluck('jumlah')
            ->toArray();
        $SumKasAWDebet = array_sum($Kas_AW_Debet);
        
        $MutasiKasDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');
        
        $MutasiKasKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');

        // $Kps=Transaksi::all()
        //     ->whereBetween('tgl_transaksi', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
        //     ->where('akun_types', '==' ,'pengeluaran')
        //     ->where('no_akun_id', '==' ,'6') 
        //     ->pluck('jumlah')
        //     ->toArray();
        // $SumKasPengeluaranBulanLalu = array_sum($Kps);

        // Bank BPD 
        //giro
        $BPD_Giro_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'6') 
            ->pluck('jumlah')
            ->toArray();
        $SumBPDGiroAWDebet = array_sum($BPD_Giro_AW_Debet);
        
        $MutasiBPDGiroDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');
        
        $MutasiBPDGiroKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');

        //tabungan
        $BPD_Tabungan_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'8') 
            ->pluck('jumlah')
            ->toArray();
        $SumBPDTabunganAWDebet = array_sum($BPD_Tabungan_AW_Debet);
        
        $MutasiBPDTabunganDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'8') 
        ->sum('jumlah');
        
        $MutasiBPDTabunganKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'8') 
        ->sum('jumlah');

        //  BiayaPegawai 
        $Biaya_PegawaiAW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->where('akun_types', '==' ,'beban')
            ->where('no_akun_id', '==' ,'25') 
            ->pluck('jumlah')
            ->toArray();
        $SumBiaya_PegawaiAWDebet = array_sum($Biaya_PegawaiAW_Debet);
        
        $MutasiBPDTabunganDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'25') 
        ->sum('jumlah');
        
        $MutasiBPDTabunganKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'beban')
        ->where('no_akun_id', '==' ,'25') 
        ->sum('jumlah');

        //  BiayaLainlain
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
                'SumBiaya_PegawaiAWDebet',
                'SumBiayaLainAWDebet',
                'BiayaLainAK_Debet',
            ));
    }

    public function neracabulanan(Request $request){

        // Kas
        $Kas_AW_Debet=Transaksi::all()
            ->whereBetween('tgl_transaksi', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'6') 
            ->pluck('jumlah')
            ->toArray();
        $SumKasAWDebet = array_sum($Kas_AW_Debet);
        
        $MutasiKasDebet=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'penerimaan')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');
        
        $MutasiKasKredit=Transaksi::all()
        ->where('tgl_transaksi', '>=', Carbon::now('Asia/Jakarta')->startOfMonth())
        ->where('akun_types', '==' ,'pengeluaran')
        ->where('no_akun_id', '==' ,'6') 
        ->sum('jumlah');
        
        $totalKas = $SumKasAWDebet + $MutasiKasDebet - $MutasiKasKredit;

        return view('laporan/neraca',
            compact(
                'totalKas'
            ));
    }

}
