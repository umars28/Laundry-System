<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusPesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index() {
        $pesananStatuses = StatusPesanan::all()->sortByDesc('id');
        return view('admin.pesanan.index', compact('pesananStatuses'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'status' => 'required|unique:status_pesanans,status',
            'urutan' => 'required|unique:status_pesanans,urutan'
        ]);
        $status = new  StatusPesanan();
        $status->status = $request->status;
        $status->urutan = $request->urutan;
        $status->save();
        session()->flash('success', 'Data berhasil ditambah');
        return redirect()->back();
    }

    public function edit($id) {
        $pesanan = StatusPesanan::findOrFail($id);
        $pesananStatuses = StatusPesanan::all()->sortByDesc('id');
        return view('admin.pesanan.index', compact('pesananStatuses', 'pesanan'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'status' => 'required|unique:status_pesanans,status,' . $id,
            'urutan' => 'required|unique:status_pesanans,urutan,' . $id
        ]);
        $pesanan = StatusPesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->urutan = $request->urutan;
        $pesanan->saveOrFail();
        session()->flash('success', 'Data berhasil diupdate');
        return redirect(route('admin.pesanan.status'));
    }

    public function delete($id) {
        $pesanan = StatusPesanan::findOrFail($id);
        $pesanan->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
