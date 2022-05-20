<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
    public function login()
    {
        return view('client.login');
    }

    public function register()
    {
        return view('client.register');
    }

    public function proses_register(request $request)
    {

        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);


        $data = new User();
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        if ($data) {
            return redirect()->back()->with('success', 'Register Success');
        } else {
            return redirect()->back()->with('error', 'Register Failed');
        }

        // event(new Registered($data));
    }

    public function proses_login(request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $check = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($check)) {
            return redirect()->route('client.home')->with('status', session('status'));
        }
        return redirect()->route('admin.home')->with('status', session('status'));
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route('client.login');
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
