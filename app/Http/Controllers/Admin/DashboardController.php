<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $totalKaryawan = DB::table('users')->where('role', '=', 'karyawan')->count();
        $totalCustomer = DB::table('users')->where('role', '=', 'customer')->count();
        $totalPaket = Paket::all()->count();
        $totalTransaksi = Transaction::all()->count();
        $latestTransaction = Transaction::orderBy('id', 'DESC')->take(3)->get();
        return view('admin.dashboard', [
            'totalKaryawan' => $totalKaryawan,
            'totalCustomer' => $totalCustomer,
            'totalPaket' => $totalPaket,
            'totalTransaksi' => $totalTransaksi,
            'latestTransaction' => $latestTransaction
        ]);
    }
}
