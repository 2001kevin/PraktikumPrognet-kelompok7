<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


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

    public function approve(){
        $transactions = transaction::all();
        return view('approvement', compact('transactions'));
    }

    public function laporan(){
        //$notifikasi = admin_notification::all();
        $now = Carbon::now('Asia/Makassar');
        $allTransactions = Transaction::where('status', 'barang telah sampai di tujuan')->get();
        //dd($allTransactions);
        $allSales = Transaction::where('status', 'barang telah sampai di tujuan')->count();
        $monthlySales = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', $now->month)->count();
        $annualSales = Transaction::where('status', 'barang telah sampai di tujuan')->whereYear('created_at', $now->year)->count();
        $monthlyTransactions = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', $now->month)->get();
        $annualTranscations = Transaction::where('status', 'barang telah sampai di tujuan')->whereYear('created_at', $now->year)->get();
        //dd($allTransactions);
        $incomeTotal = 0;
        $incomeMonthly = 0;
        $incomeAnnual = 0;

        foreach ($allTransactions as $transaction) {
            $incomeTotal += $transaction->total;
        }


        foreach ($monthlyTransactions as $monthly) {
            $incomeMonthly += $monthly->total;
        }

        foreach ($annualTranscations as $annual) {
            $incomeAnnual += $annual->total;
        }


        $january = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '01')->count();
        $february = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '02')->count();
        $march = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '03')->count();
        $april = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '04')->count();
        $may = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '05')->count();
        $june = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '06')->count();
        $july = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '07')->count();
        $august = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '08')->count();
        $september = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '09')->count();
        $october = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '10')->count();
        $november = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '11')->count();
        $december = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '12')->count();

        $jan = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '01')->sum('total');
        $feb = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '02')->sum('total');
        $mar = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '03')->sum('total');
        $ap = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '04')->sum('total');
        $mei = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '05')->sum('total');
        $jun = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '06')->sum('total');
        $jul = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '07')->sum('total');
        $aug = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '08')->sum('total');
        $sept = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '09')->sum('total');
        $octo = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '10')->sum('total');
        $nove = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '11')->sum('total');
        $dece = Transaction::where('status', 'barang telah sampai di tujuan')->whereMonth('created_at', '12')->sum('total');

        return view('laporan', compact('now','allSales', 'monthlySales', 'annualSales', 'incomeTotal', 'incomeMonthly', 'incomeAnnual', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'
        ,'jan','feb','mar','ap','mei','jun','jul','aug','sept','octo','nove','dece'));
    }

}
