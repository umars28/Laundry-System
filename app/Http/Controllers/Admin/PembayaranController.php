<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index() {
        $pembayaranStatuses = PaymentStatus::all()->sortByDesc('id');
        return view('admin.pembayaran.index', compact('pembayaranStatuses'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'status' => 'required|unique:payment_statuses,status',
            'urutan' => 'required|unique:payment_statuses,urutan'
        ]);
        $status = new  PaymentStatus();
        $status->status = $request->status;
        $status->urutan = $request->urutan;
        $status->save();
        session()->flash('success', 'Data berhasil ditambah');
        return redirect()->back();
    }

    public function edit($id) {
        $pembayaran = PaymentStatus::findOrFail($id);
        $pembayaranStatuses = PaymentStatus::all()->sortByDesc('id');
        return view('admin.pembayaran.index', compact('pembayaranStatuses', 'pembayaran'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'status' => 'required|unique:payment_statuses,status,' .$id,
            'urutan' => 'required|unique:payment_statuses,urutan,' .$id
        ]);
        $pembayaran = PaymentStatus::findOrFail($id);
        $pembayaran->status = $request->status;
        $pembayaran->urutan = $request->urutan;
        $pembayaran->saveOrFail();
        session()->flash('success', 'Data berhasil diupdate');
        return redirect(route('admin.pembayaran.status'));
    }

    public function delete($id) {
        $pembayaran = PaymentStatus::findOrFail($id);
        $pembayaran->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function methodIndex() {
        $pembayaranMethods = PaymentMethod::all()->sortByDesc('id');
        return view('admin.pembayaran.methodIndex', compact('pembayaranMethods'));
    }

    public function methodStore(Request $request) {
        $this->validate($request, [
            'method' => 'required|unique:payment_methods,method'
        ]);
        $method = new  PaymentMethod();
        $method->method = $request->method;
        $method->save();
        session()->flash('success', 'Data berhasil ditambah');
        return redirect()->back();
    }

    public function methodEdit($id) {
        $pembayaran = PaymentMethod::findOrFail($id);
        $pembayaranMethods = PaymentMethod::all()->sortByDesc('id');
        return view('admin.pembayaran.methodIndex', compact('pembayaranMethods', 'pembayaran'));
    }

    public function methodUpdate(Request $request, $id) {
        $this->validate($request, [
            'method' => 'required|unique:payment_methods,method,' .$id
        ]);
        $pembayaran = PaymentMethod::findOrFail($id);
        $pembayaran->method = $request->method;
        $pembayaran->saveOrFail();
        session()->flash('success', 'Data berhasil diupdate');
        return redirect(route('admin.pembayaran.method'));
    }

    public function methodDelete($id) {
        $pembayaran = PaymentMethod::findOrFail($id);
        $pembayaran->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
