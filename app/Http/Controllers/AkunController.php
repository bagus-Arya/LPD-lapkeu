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

    public function store(Request $request){
        $attributes = request()->validate([
            'no_akun' => ['required','integer'],
            'nama_akun' => ['required','string', 'max:50'],
            'akun_types'=>[
                'required',
                'string',
                Rule::in(['pengeluaran','pemasukan','beban'])
            ]
        ]);

        NoAkun::create($attributes);
        return redirect()->back()->with('successTambahAkun','Akun Berhasil Ditambahkan');
    }

    public function destroy(NoAkun $akun,Request $request){
        $akun->delete();
        return redirect()->back()->with('successDeleteAkun','Akun Berhasil Dihapus');
    }
}
