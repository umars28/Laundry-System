<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentConfirmationController extends Controller
{
    public function index() {
        $confirmations = PaymentConfirmation::with('customer')->get();
        return view('admin.pembayaran.bukti', compact('confirmations'));
    }

    public function delete($id) {
        $confirmation = PaymentConfirmation::findOrFail($id);
        Storage::delete('public/bukti_pembayaran/'.$confirmation->image);
        $confirmation->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
