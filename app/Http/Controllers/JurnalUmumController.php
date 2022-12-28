<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Jurnal;
use App\Models\NoAkun;

class JurnalUmumController extends Controller
{
    public function index(Request $request){
        $ListJurnalUmum=Jurnal::all();
        $Akuns=NoAkun::all();
        return view('laporan/jurnal-umum',compact('ListJurnalUmum','Akuns'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'no_akun_id' => [
                'required',
                'integer',
            ],
            'jumlah'=>['required','integer'],
            'tgl_transaksi'=>['required'],
            'types'=>[
                'required',
                'string',
                Rule::in(['debet','kredit'])
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'addJurnal')
                    ->withInput();
        }

        
        // Retrieve the validated input...
        $validated = $validator->validateWithBag('addJurnal');
        Jurnal::create($validated);
        return redirect()->back()->with('successTambahjurnal','Data Jurnal Berhasil Ditambahkan');
    }

    public function update(Jurnal $transaksi,Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'no_akun_id' => [
                'required',
                'integer',
            ],
            'jumlah'=>['required','integer'],
            'tgl_transaksi'=>['required'],
            'types'=>[
                'required',
                'string',
                Rule::in(['debet','kredit'])
            ],
        ]);     

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator,'updateJurnalUmum')
                    ->with('updateId',$transaksi->id)
                    ->withInput();
        }

        
        // Retrieve the validated input...
        $validated = $validator->validateWithBag('updateJurnalUmum');
        $transaksi->update($validated);
        return redirect()->back()->with('successUpdateJurnalUmum','JurnalUmum Berhasil Diupdate');
    }

    public function destroy(Jurnal $transaksi,Request $request){
        $transaksi->delete();
        return redirect()->back()->with('successDeletepenerimaan','Pemasukan Berhasil Dihapus');
    }
}
