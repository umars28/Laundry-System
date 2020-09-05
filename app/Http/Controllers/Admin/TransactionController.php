<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentStatus;
use App\Models\StatusPesanan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        if (Auth::user()->role == 'admin') {
            $transactions = Transaction::with('customer', 'paket', 'paymentMethod', 'paymentStatus', 'statusPesanan')->orderByDesc('id')->where('invoice_number', 'LIKE', "%$search%")->paginate(4);
        } else {
            $status = PaymentStatus::where('status', '=', 'paid')->first();
            $transactions = Transaction::with('customer', 'paket', 'paymentMethod', 'paymentStatus', 'statusPesanan')->where('paymentStatus_id', '=', $status->id)->paginate(4);
        }

        return view('admin.transaction.index', compact('transactions'));
    }

    public function edit(Request $request,$id) {
        $status = Transaction::findOrFail($id);
        $paymentStatus = PaymentStatus::all();
        $search = $request->search;
        $transactions = Transaction::with('customer', 'paket', 'paymentMethod', 'paymentStatus', 'statusPesanan')->orderByDesc('id')->where('invoice_number', 'LIKE', "%$search%")->paginate(4);
        return view('admin.transaction.index', compact('transactions','paymentStatus','status'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'status' => 'required'
        ]);
        $status = Transaction::findOrFail($id);
        $status->update([
            'paymentStatus_id' => $request->status
        ]);
        session()->flash('success', 'Data berhasil diupdate');
        return redirect()->back();
    }

    public function delete($id) {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function editStatus(Request $request, $id) {
        $statuses = Transaction::findOrFail($id);
        $statusPesanan = StatusPesanan::all();
        $search = $request->search;
        if (Auth::user()->role == 'admin') {
            $transactions = Transaction::with('customer', 'paket', 'paymentMethod', 'paymentStatus', 'statusPesanan')->orderByDesc('id')->where('invoice_number', 'LIKE', "%$search%")->paginate(4);
        } else {
            $status = PaymentStatus::where('status', '=', 'paid')->first();
            $transactions = Transaction::with('customer', 'paket', 'paymentMethod', 'paymentStatus', 'statusPesanan')->where('paymentStatus_id', '=', $status->id)->paginate(4);
        }
        return view('admin.transaction.index', compact('transactions','statusPesanan','statuses'));
    }

    public function updateStatus(Request $request, $id) {
        $this->validate($request, [
            'status' => 'required'
        ]);
        $status = Transaction::findOrFail($id);
        $status->update([
            'statusPesanan_id' => $request->status
        ]);
        session()->flash('success', 'Data berhasil diupdate');
        return redirect()->back();
    }
}
