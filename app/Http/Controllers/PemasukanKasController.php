<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaksi;
use App\Models\NoAkun;

class PemasukanKasController extends Controller
{
    public function index(Request $request){
        $Pemasukans=Transaksi::whereHas('akun',function($query){
            return $query->where('akun_types','pemasukan');
        })->with('akun')->orderBy('created_at', 'desc')->get();
        $Akuns=NoAkun::where('akun_types','pemasukan')->get();
        return view('kas/penerimaan-kas',compact('Pemasukans','Akuns'));
    }

    public function store(Request $request){
        if($request->user()->user_type!='bendahara'){
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    Rule::exists('no_akuns','id')->where(function ($query) {
                        return $query->where('akun_types', 'pemasukan');
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
                        return $query->where('akun_types', 'pemasukan');
                    })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'konfirmasi'=>['nullable','boolean']
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'addPenerimaan')
                    ->withInput();
        }

        
        // Retrieve the validated input...
        $validated = $validator->validateWithBag('addPenerimaan');
        Transaksi::create($validated);
        return redirect()->back()->with('successTambahpemasukan','Pemasukan Berhasil Ditambahkan');
    }

    public function update(Transaksi $transaksi,Request $request){
        if($request->user()->user_type!='bendahara'){
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    Rule::exists('no_akuns','id')->where(function ($query) {
                        return $query->where('akun_types', 'pemasukan');
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
                        return $query->where('akun_types', 'pemasukan');
                    })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'konfirmasi'=>['nullable','boolean']
            ]);
        }

        

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'updatepemasukan')
                    ->with('updateId',$transaksi->id)
                    ->withInput();
        }

        
        // Retrieve the validated input...
        $validated = $validator->validateWithBag('updatepemasukan');
        $transaksi->update($validated);
        return redirect()->back()->with('successUpdatepemasukan','Pemasukan Berhasil Diupdate');
    }

    public function destroy(Transaksi $transaksi,Request $request){
        $transaksi->delete();
        return redirect()->back()->with('successDeletepemasukan','Pemasukan Berhasil Dihapus');
    }
}

