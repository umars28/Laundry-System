<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        $customers = DB::table('customers')->orderByDesc('id')->where('name', 'LIKE', "%$search%")
                                                                           ->orWhere('email', 'LIKE', "%$search%" )
                                                                            ->orWhere('username', 'LIKE', "%$search%")->get();
        return view('admin.customer.index', compact('customers'));
    }

    public function delete($id, $email) {
        $customer = Customer::findOrFail($id)->delete();
        $user = DB::table('users')->where('email', '=', $email)->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect(route('admin.customer'));
    }
}
