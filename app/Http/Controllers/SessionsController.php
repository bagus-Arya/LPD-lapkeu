<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username'=>'required',
            'password'=>'required' 
        ]);

        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            if(auth()->user()->user_type=="admin"){
                return redirect()->intended(route('admin.'));
            }
            else if(auth()->user()->user_type=="ketua"){
                return redirect()->intended(route('ketua.'));
            }
            else if(auth()->user()->user_type=="bendahara"){
                return redirect()->intended(route('bendahara.'));
            }
            else{
                return redirect()->intended(route('sekretaris.'));
            }
            // else{
            //     return redirect()->intended('dashboard/banjar/'.auth()->user()->banjar_id.'/profilebanjar');
            // }
            return redirect('dashboard')->with(['success'=>'You are logged in.']);
        }
        else{

            return back()->withErrors(['username'=>'Username or password invalid.']);
        }
    }
    
    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
