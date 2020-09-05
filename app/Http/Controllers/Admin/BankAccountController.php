<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index() {
        $listAccount = BankAccount::all()->sortByDesc('id');
        return view('admin.bank_account.index', compact('listAccount'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'bank_account' => 'required|unique:bank_accounts,bank_account',
            'account_name' => 'required',
            'account_number' => 'required|unique:bank_accounts,account_number'
        ]);
        $bank_account = new BankAccount();
        $bank_account->bank_account = $request->bank_account;
        $bank_account->account_name = $request->account_name;
        $bank_account->account_number = $request->account_number;
        $bank_account->save();
        session()->flash('success', 'Data berhasil ditambah');
        return redirect()->back();
    }

    public function edit($id) {
        $account = BankAccount::findOrFail($id);
        $listAccount = BankAccount::all()->sortByDesc('id');
        return view('admin.bank_account.index', compact('account','listAccount'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'bank_account' => 'required|unique:bank_accounts,bank_account,' .$id,
            'account_name' => 'required',
            'account_number' => 'required|unique:bank_accounts,account_number,' .$id
        ]);
        $account = BankAccount::findOrFail($id);
        $account->bank_account = $request->bank_account;
        $account->account_name = $request->account_name;
        $account->account_number = $request->account_number;
        $account->saveOrFail();
        session()->flash('success', 'Data berhasil diupdate');
        return redirect(route('admin.bank.account'));
    }

    public function delete($id) {
        $account = BankAccount::findOrFail($id);
        $account->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
