<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        return view('client.home');
    }

    public function redirect()
    {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('client.home')->with('status', session('status'));
    }

}
