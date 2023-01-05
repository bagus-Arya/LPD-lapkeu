<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use DB;

class HomeController extends Controller
{
    public function home()
    {

        $Jan=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '01')
        ->sum('jumlah');

        $Feb=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '02')
        ->sum('jumlah');
        
        $Mar=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '03')
        ->sum('jumlah');

        $Apr=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '04')
        ->sum('jumlah');

        $Mei=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '05')
        ->sum('jumlah');

        $Jun=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '06')
        ->sum('jumlah');

        $Jul=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '07')
        ->sum('jumlah');
       
        $Aug=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '08')
        ->sum('jumlah');

        $Sep=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '09')
        ->sum('jumlah');
       
        $Oct=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '10')
        ->sum('jumlah');

        $Nov=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '11')
        ->sum('jumlah');
       
        
        $Des=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '12')
        ->sum('jumlah');

        // Pengeluaran
        $P_Jan=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '01')
        ->sum('jumlah');

        $P_Feb=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '02')
        ->sum('jumlah');
        
        $P_Mar=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '03')
        ->sum('jumlah');

        $P_Apr=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '04')
        ->sum('jumlah');

        $P_Mei=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '05')
        ->sum('jumlah');

        $P_Jun=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '06')
        ->sum('jumlah');

        $P_Jul=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '07')
        ->sum('jumlah');
       
        $P_Aug=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '08')
        ->sum('jumlah');

        $P_Sep=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '09')
        ->sum('jumlah');
       
        $P_Oct=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '10')
        ->sum('jumlah');

        $P_Nov=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '11')
        ->sum('jumlah');
       
        
        $P_Des=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '12')
        ->sum('jumlah');

        return view('dashboard-lpd',
            compact(
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Des',
                'P_Jan',
                'P_Feb',
                'P_Mar',
                'P_Apr',
                'P_Mei',
                'P_Jun',
                'P_Jul',
                'P_Aug',
                'P_Sep',
                'P_Oct',
                'P_Nov',
                'P_Des'
            ));
    }
}
