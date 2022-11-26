<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\NoAkun;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index(){
        $allno_akun=NoAkun::all();
        return view('akun/akun-page',compact('allno_akun'));
    }

    // public function store(Request $request){
    //     // $attributes = request()->validateWithBag('addAkun',[
    //     //     'no_akun' => ['required','integer'],
    //     //     'nama_akun' => ['required','string', 'max:50'],
    //     //     'akun_types'=>[
    //     //         'required',
    //     //         'string',
    //     //         Rule::in(['pengeluaran','pemasukan','beban'])
    //     //     ]
    //     // ]);
    //     $validator = Validator::make($request->all(), [
    //         'no_akun' => ['required','integer'],
    //         'nama_akun' => ['required','string', 'max:50'],
    //     ]);
    //     if ($validator->fails()) {
    //         return redirect()->back()
    //                 ->withErrors($validator,'addAkun')
    //                 ->withInput();
    //     }

 
    //     // Retrieve the validated input...
    //     $validated = $validator->validateWithBag('addAkun');

    //     NoAkun::create($validated);
    //     return redirect()->back()->with('successTambahAkun','Akun Berhasil Ditambahkan');
    // }

    // public function destroy(NoAkun $akun,Request $request){
    //     $akun->delete();
    //     return redirect()->back()->with('successDeleteAkun','Akun Berhasil Dihapus');
    // }

    // public function update(NoAkun $akun,Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'no_akun' => ['required','integer'],
    //         'nama_akun' => ['required','string', 'max:50']
    //     ]);
    //     if ($validator->fails()) {
    //         return redirect()->back()
    //                 ->withErrors($validator,'updateAkun')
    //                 ->withInput()
    //                 ->with('updateId',$akun->id);
    //     }

 
    //     // Retrieve the validated input...
    //     $validated = $validator->validateWithBag('updateAkun');

    //     $akun->update($validated);
    //     return redirect()->back()->with('successUpdateAkun','Akun Berhasil Diupdate');
    // }
}
