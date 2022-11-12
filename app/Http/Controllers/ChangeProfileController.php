<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ChangeProfileController extends Controller
{
    public function update(Request $request){
        $validated=$request->validateWithBag('updateProfile',[
            'fullname' => ['required', 'max:50'],
            'username' => ['required', 'max:50', 'max:50', Rule::unique('users','username')->ignore($request->user()->id,'id')],
            'email' => ['required', 'email', 'max:50', Rule::unique('users','email')->ignore($request->user()->id,'id')],
            'phone'=> ['required','max:50'],
            'photo'=>'nullable|image|max:10000'
        ]);

        // ubah foto ke base64 jika ada
        if(isset($validated['photo'])){
            $validated['photo']='data:'.$validated['photo']->getClientMimeType().';base64,'.base64_encode(file_get_contents($validated['photo']));
        }
        // return $validated;
        $request->user()->update($validated);
        return redirect()->back()->with('successUpdateProfile','Profile Berhasil Diupdate');
    }
}
