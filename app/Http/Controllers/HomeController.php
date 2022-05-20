<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('client.home');
    }
    public function redirect()
    {

        return redirect()->route('client.home')->with('status', session('status'));
    }
}
