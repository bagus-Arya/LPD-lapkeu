<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class NeracaPercobaanController extends Controller
{
    public function index(Request $request){
        $KasPenerimaan=Transaksi::all()
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'4') // Kas
            ->sum('jumlah');

        $KasPengeluaran=Transaksi::all()
            ->where('akun_types', '==' ,'pengeluaran')
            ->where('no_akun_id', '==' ,'4') // Kas
            ->sum('jumlah');

        $TabunganMasuk=Transaksi::all()
            ->where('akun_types', '==' ,'penerimaan')
            ->where('no_akun_id', '==' ,'5') // Tabungan
            ->sum('jumlah');
        
        return view('laporan/neraca-percobaan',compact('KasPengeluaran','KasPenerimaan','TabunganMasuk'));
    }

}
