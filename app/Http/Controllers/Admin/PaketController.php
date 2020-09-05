<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        $pakets = DB::table('pakets')->orderByDesc('id')->where('type', 'LIKE', "%$search%")->get();
        return view('admin.paket.index', compact('pakets'));
    }

    public function create() {
        return view('admin.paket.create');
    }

    public function store(Request $request) {
        $pakets = new Paket();
        $this->validate($request, [
            'type' => 'required|unique:pakets',
            'description' => 'required',
            'price_kg' => 'required',
            'price_satuan' => 'required'
        ]);
        if ($promo = $request->is_promo ? : 0) {
            $this->validate($request, [
                'promo_name' => 'required|unique:pakets',
                'promo_code' => 'required|unique:pakets',
                'promo_price' => 'required'
            ]);
            $pakets->promo_name = $request->promo_name;
            $pakets->promo_code = $request->promo_code;
            $pakets->promo_price = $request->promo_price;
        }

        $pakets->is_promo = $promo;
        $pakets->type = $request->type;
        $pakets->description = $request->description;
        $pakets->price_kg = $request->price_kg;
        $pakets->price_satuan = $request->price_satuan;
        $pakets->save();
        session()->flash('success', 'Data berhasil disimpan');
        return redirect(route('admin.paket'));
    }

    public function edit($id) {
        $paket = Paket::findOrFail($id);
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, $id) {
        $paket = Paket::findOrFail($id);
        $this->validate($request, [
            'type' => 'required|unique:pakets,type,' .$id,
            'description' => 'required',
            'price_kg' => 'required',
            'price_satuan' => 'required'
        ]);
        if ($promo = $request->is_promo ? : 0) {
            $this->validate($request, [
                'promo_name' => 'required|unique:pakets,promo_name,' .$id,
                'promo_code' => 'required|unique:pakets,promo_code,' .$id,
                'promo_price' => 'required'
            ]);
            $paket->promo_name = $request->promo_name;
            $paket->promo_code = $request->promo_code;
            $paket->promo_price = $request->promo_price;
        }

        $paket->is_promo = $promo;
        $paket->type = $request->type;
        $paket->description = $request->description;
        $paket->price_kg = $request->price_kg;
        $paket->price_satuan = $request->price_satuan;
        $paket->save();
        session()->flash('success', 'Data berhasil disimpan');
        return redirect(route('admin.paket'));
    }

    public function delete($id) {
        $paket = Paket::findOrFail($id)->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
