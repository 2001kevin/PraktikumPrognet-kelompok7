<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function proses_login(request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $check = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($check)) {
            return redirect()->route('admin.home')->with('success', 'Login Success');
        } else {
            return redirect()->back()->with('erorr', 'Login Failed');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.logout');
    }
}
