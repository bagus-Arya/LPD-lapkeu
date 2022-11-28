<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaksi;
use App\Models\NoAkun;

class BebanController extends Controller
{
    public function index(Request $request){
        $Bebans=Transaksi::where('akun_types','beban')->orderBy('tgl_transaksi', 'desc')->get();
        $Akuns=NoAkun::all();
        return view('beban/beban-beban',compact('Bebans','Akuns'));
    }

    public function store(Request $request){
        if($request->user()->user_type!='bendahara'){
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    // Rule::exists('no_akuns','id')->where(function ($query) {
                    //     return $query->where('akun_types', 'beban');
                    // })
                ],
                'akun_types'=>[
                    'required',
                    'string',
                    Rule::in(['pengeluaran','penerimaan','beban'])
                ],
                'tgl_transaksi'=>['required'],
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
                    // Rule::exists('no_akuns','id')->where(function ($query) {
                    //     return $query->where('akun_types', 'beban');
                    // })
                ],
                'tgl_transaksi'=>['required'],
                'akun_types'=>[
                    'required',
                    'string',
                    Rule::in(['pengeluaran','penerimaan','beban'])
                ],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'konfirmasi'=>['nullable','boolean']
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'addBeban')
                    ->withInput();
        }

        
        // Retrieve the validated input...
        $validated = $validator->validateWithBag('addBeban');
        Transaksi::create($validated);
        return redirect()->back()->with('successTambahBeban','Beban Berhasil Ditambahkan');
    }

    public function update(Transaksi $transaksi,Request $request){
        if($request->user()->user_type!='bendahara'){
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    // Rule::exists('no_akuns','id')->where(function ($query) {
                    //     return $query->where('akun_types', 'beban');
                    // })
                ],
                'tgl_transaksi'=>['required'],
                'keterangan' => ['required','string', 'max:50'],
                'akun_types'=>[
                    'required',
                    'string',
                    Rule::in(['pengeluaran','penerimaan','beban'])
                ],
                'jumlah'=>['required','integer'],
                // 'konfirmasi'=>['nullable','boolean']
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'no_akun_id' => [
                    'required',
                    'integer',
                    // Rule::exists('no_akuns','id')->where(function ($query) {
                    //     return $query->where('akun_types', 'beban');
                    // })
                ],
                'akun_types'=>[
                    'required',
                    'string',
                    Rule::in(['pengeluaran','penerimaan','beban'])
                ],
                'tgl_transaksi'=>['required'],
                'keterangan' => ['required','string', 'max:50'],
                'jumlah'=>['required','integer'],
                'konfirmasi'=>['nullable','boolean']
            ]);
        }

        

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'updateBeban')
                    ->with('updateId',$transaksi->id)
                    ->withInput();
        }

        
        // Retrieve the validated input...
        $validated = $validator->validateWithBag('updateBeban');
        $transaksi->update($validated);
        return redirect()->back()->with('successUpdateBeban','Beban Berhasil Diupdate');
    }

    public function destroy(Transaksi $transaksi,Request $request){
        $transaksi->delete();
        return redirect()->back()->with('successDeleteBeban','Beban Berhasil Dihapus');
    }
}
