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
        $Pemasukans=Transaksi::where('akun_types','penerimaan')
        ->orderBy('tgl_transaksi', 'desc')->get();
        $Akuns=NoAkun::all();
        return view('kas/penerimaan-kas',compact('Pemasukans','Akuns'));
    }

    public function store(Request $request){
        // return $request->all();
        if($request->user()->user_type!='bendahara'){
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    // Rule::exists('transaksis','id')->where(function ($query) {
                    //     return $query->where('akun_types', 'penerimaan');
                    // })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'tgl_transaksi'=>['required'],
                'akun_types'=>[
                    'required',
                    'string',
                    Rule::in(['pengeluaran','penerimaan','beban'])
                ],
                // 'konfirmasi'=>['nullable','boolean']
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    // Rule::exists('transaksis','id')->where(function ($query) {
                    //     return $query->where('akun_types', 'penerimaan');
                    // })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'tgl_transaksi'=>['required'],
                'akun_types'=>[
                    'required',
                    'string',
                    Rule::in(['pengeluaran','penerimaan','beban'])
                ],
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
        return redirect()->back()->with('successTambahpenerimaan','Pemasukan Berhasil Ditambahkan');
    }

    public function update(Transaksi $transaksi,Request $request){
        // return $request->all();
        if($request->user()->user_type!='bendahara'){
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    // Rule::exists('no_akuns','id')->where(function ($query) {
                    //     return $query->where('akun_types', 'penerimaan');
                    // })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'tgl_transaksi'=>['required'],
                'akun_types'=>[
                    'required',
                    'string',
                    Rule::in(['pengeluaran','penerimaan','beban'])
                ],
                // 'konfirmasi'=>['nullable','boolean']
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    // Rule::exists('no_akuns','id')->where(function ($query) {
                    //     return $query->where('akun_types', 'penerimaan');
                    // })
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'tgl_transaksi'=>['required'],
                'akun_types'=>[
                    'required',
                    'string',
                    Rule::in(['pengeluaran','penerimaan','beban'])
                ],
                'konfirmasi'=>['nullable','boolean']
            ]);
        }

        

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'updatePenerimaan')
                    ->with('updateId',$transaksi->id)
                    ->withInput();
        }

        
        // Retrieve the validated input...
        $validated = $validator->validateWithBag('updatePenerimaan');
        $transaksi->update($validated);
        return redirect()->back()->with('successUpdatepenerimaan','Pemasukan Berhasil Diupdate');
    }

    public function destroy(Transaksi $transaksi,Request $request){
        $transaksi->delete();
        return redirect()->back()->with('successDeletepenerimaan','Pemasukan Berhasil Dihapus');
    }
}

