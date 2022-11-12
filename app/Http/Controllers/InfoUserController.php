<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use App\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class InfoUserController extends Controller
{
    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
        )
    {
        $this->userRepository = $userRepository;
    }

    public function create()
    {
        return view('laravel-examples/user-profile');
    }

    public function viewAllUser()
    {
        $alluser =  $this->userRepository->getAllUserPaginated();
        return view('laravel-examples/user-management',['alluser' => $alluser]);
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'fullname' => ['required', 'max:50'],
            'username' => ['required', 'max:50', 'max:50', Rule::unique('users','username')],
            'email' => ['required', 'email', 'max:50', Rule::unique('users','email')],
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
            'phone'     => ['required','max:50'],
            'user_type'=>[
                'required',
                'string',
                Rule::in(['ketua','bendahara','sekretaris'])
            ]
        ]);

        User::create($attributes);
        return redirect()->back()->with('successTambahUser','User Berhasil Ditambahkan');
        // return redirect('/user-profile')->with('success','Profile updated successfully');
    }

    public function destroy(User $user,Request $request)
    {
        $user->delete();
        return redirect()->back()->with('successDeleteUser','User Berhasil Dihapus');
        // return redirect('/user-profile')->with('success','Profile updated successfully');
    }
}
