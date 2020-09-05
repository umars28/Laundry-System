<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Paket;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $listPaket = Paket::all()->sortByDesc('id');
        $about = About::first();
        $paymentMethod = PaymentMethod::all()->sortByDesc('id');
        return view('home', compact('listPaket', 'about', 'paymentMethod'));
    }
}
