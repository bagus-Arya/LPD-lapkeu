<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use DB;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $now = Carbon::now();
        $yearNow = $now->year;
        // dump($yearNow);
        if (Auth::user()->user_type=="bendahara") {
        $Jan=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '01')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $Feb=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '02')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');
        
        $Mar=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '03')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $Apr=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '04')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $Mei=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '05')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $Jun=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '06')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $Jul=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '07')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');
       
        $Aug=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '08')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $Sep=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '09')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');
       
        $Oct=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '10')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $Nov=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '11')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');
       
        
        $Des=DB::table('transaksis')
        ->where('akun_types','penerimaan')
        ->whereMonth('tgl_transaksi', '12')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        // Pengeluaran
        $P_Jan=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '01')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $P_Feb=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '02')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');
        
        $P_Mar=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '03')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $P_Apr=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '04')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $P_Mei=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '05')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $P_Jun=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '06')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $P_Jul=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '07')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');
       
        $P_Aug=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '08')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $P_Sep=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '09')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');
       
        $P_Oct=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '10')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');

        $P_Nov=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '11')
        ->whereYear('tgl_transaksi', $yearNow)
        ->sum('jumlah');
       
        
        $P_Des=DB::table('transaksis')
        ->where('akun_types','pengeluaran')
        ->whereMonth('tgl_transaksi', '12')
        ->whereYear('tgl_transaksi', $yearNow)
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
        }else {
            return view('dashboard-new');
        }
    }
}
