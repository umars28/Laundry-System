<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        $karyawans = DB::table('karyawans')->orderByDesc('id')->where('name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%" )
            ->orWhere('username', 'LIKE', "%$search%")->get();
        return view('admin.karyawan.index', compact('karyawans'));
    }

    public function create() {
        return view('admin.karyawan.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:karyawans,username',
            'email' => 'required|email|unique:karyawans,email',
            'phone_number' => 'required',
            'address' => 'required'
        ]);
        $karyawan = new Karyawan();
        $karyawan->name = $request->name;
        $karyawan->username = $request->username;
        $karyawan->email = $request->email;
        $karyawan->phone_number = $request->phone_number;
        $karyawan->address = $request->address;
        $karyawan->password = Hash::make('karyawan');
        $karyawan->save();

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make('karyawan');
        $user->role = 'karyawan';
        $user->save();

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect(route('admin.karyawan'));
    }

    public function edit($id) {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    public function delete($id) {
        $karyawan = Karyawan::findOrFail($id);
        $user = DB::table('users')->where('username', '=', $karyawan->username)->delete();
        $karyawan->delete();
        session()->flash('success', 'Data karyawan berhasil dihapus');
        return redirect()->back();
    }
}
