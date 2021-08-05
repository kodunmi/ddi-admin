<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function showAdminForm(){
        return view('admin.pages.login');
    }

    public function adminLogin(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = $request->has('remember')? true : false;
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            return redirect()->route('admin.dashboard');
        }else{
            return back()->withErrors(['error' => 'We do not have your credentials']);
        }
    }

    public function adminLogout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('admin.login');
    }
}
