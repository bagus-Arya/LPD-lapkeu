<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaksi;
use App\Models\NoAkun;

class PengeluaranKasController extends Controller
{
    public function index(Request $request){
        $Pengeluarans=Transaksi::whereHas('akun',function($query){
            return $query->where('akun_types','pengeluaran');
        })->with('akun')->orderBy('created_at', 'desc')->get();
        $Akuns=NoAkun::where('akun_types','pengeluaran')->get();
        return view('kas/pengeluaran-kas',compact('Pengeluarans','Akuns'));
    }

    public function store(Request $request){
        if($request->user()->user_type!='bendahara'){
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    Rule::exists('no_akuns','id')->where(function ($query) {
                        return $query->where('akun_types', 'pengeluaran');
                    })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                // 'konfirmasi'=>['nullable','boolean']
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    Rule::exists('no_akuns','id')->where(function ($query) {
                        return $query->where('akun_types', 'pengeluaran');
                    })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'konfirmasi'=>['nullable','boolean']
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'addPengeluaran')
                    ->withInput();
        }

        
        // Retrieve the validated input...
        $validated = $validator->validateWithBag('addPengeluaran');
        Transaksi::create($validated);
        return redirect()->back()->with('successTambahPengeluaran','Pengeluaran Berhasil Ditambahkan');
    }

    public function update(Transaksi $transaksi,Request $request){
        
        if($request->user()->user_type!='bendahara'){
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    Rule::exists('no_akuns','id')->where(function ($query) {
                        return $query->where('akun_types', 'pengeluaran');
                    })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                // 'konfirmasi'=>['nullable','boolean']
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    Rule::exists('no_akuns','id')->where(function ($query) {
                        return $query->where('akun_types', 'pengeluaran');
                    })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'konfirmasi'=>['nullable','boolean']
            ]);
        }

        

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'updatePengeluaran')
                    ->with('updateId',$transaksi->id)
                    ->withInput();
        }

        
        // Retrieve the validated input...
        $validated = $validator->validateWithBag('updatePengeluaran');
        $transaksi->update($validated);
        return redirect()->back()->with('successUpdatePengeluaran','Pengeluaran Berhasil Diupdate');
    }

    public function destroy(Transaksi $transaksi,Request $request){
        $transaksi->delete();
        return redirect()->back()->with('successDeletePengeluaran','Pengeluaran Berhasil Dihapus');
    }
}
