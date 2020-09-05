<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Paket;
use App\Models\PaymentConfirmation;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Models\StatusPesanan;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class TransactionController extends Controller
{
    public function transactionConfirmation(Request $request) {
        $paket = DB::table('pakets')->where('id', '=', $request->paket)->first();
        $customer = Auth::user()->username;
        $detailCustomer = DB::table('customers')->where('username', '=', $customer)->first();
        $paymentStatus = PaymentStatus::where('urutan', '=', 1)->first();
        $statusPesanan = StatusPesanan::where('urutan', '=', 1)->first();
        $invoiceNumber = Uuid::uuid4()->toString();
        $transaction = new Transaction();
        $this->validate($request, [
            'paket' => 'required',
            'select' => 'required',
            'metode_pembayaran' => 'required'
        ]);
        if ($request->select == 'berat') {
            $this->validate($request, [
                'total_berat' => 'required'
            ]);
            $priceTotalBF = $paket->price_kg * $request->total_berat;
            $promo = $paket->is_promo == 1 ? : 0;
            if ($promo) {
                $priceTotal = $priceTotalBF - $paket->promo_price;
            } else {
                $priceTotal = $priceTotalBF;
            }
            $transaction->total_berat = $request->total_berat;
        } elseif ($request->select == 'satuan') {
            $this->validate($request, [
                'total_satuan' => 'required'
            ]);
            $priceTotalBF = $paket->price_satuan * $request->total_satuan;
            $promo = $paket->is_promo == 1 ? : 0;
            if ($promo) {
                $priceTotal = $priceTotalBF - $paket->promo_price;
            } else {
                $priceTotal = $priceTotalBF;
            }
            $transaction->total_satuan = $request->total_satuan;
        }

        $transaction->price_total = $priceTotal;
        $transaction->customer_id = $detailCustomer->id;
        $transaction->paket_id = $request->paket;
        $transaction->paymentMethod_id = $request->metode_pembayaran;
        $transaction->paymentStatus_id = $paymentStatus->id;
        $transaction->statusPesanan_id = $statusPesanan->id;
        $transaction->invoice_number = $invoiceNumber;
        $transaction->save();
        $showPesanan = Transaction::with('paket','paymentMethod', 'paymentStatus', 'statusPesanan')->where('invoice_number', '=', $invoiceNumber)->first();
        return view('customer.index', compact('showPesanan'));
    }

    public function transactionCancel($id) {
        $statusPesanan = DB::table('status_pesanans')->orderBy('urutan', 'DESC')->first();
        $idPesanan = $statusPesanan->id;
        DB::table('transactions')->where('id', '=', $id)->update([
            'statusPesanan_id' => $idPesanan
        ]);
        session()->flash('success', 'Cancel Succedeed');
        return redirect(route('transaction.show'));
    }

    public function showTransaction() {
        $user_name = Auth::user()->username;
        $usernameCustomer = DB::table('customers')->select('id')->where('username', '=', $user_name)->first();
        $listTransaction = Transaction::all()->where('customer_id', '=', $usernameCustomer->id);
        return view('customer.showTransaction', compact('listTransaction'));
    }

    public function paymentConfirmation() {
        $paymentMethod = PaymentMethod::all();
        return view('customer.addPayment', compact('paymentMethod'));
    }

    public function paymentConfirmationStore(Request $request) {
        $this->validate($request, [
            'invoice_number' => 'required',
            'metode_pembayaran' => 'required'
        ]);

        $transaction = Transaction::where('invoice_number', '=', $request->invoice_number)
                ->where('paymentMethod_id', '=', $request->metode_pembayaran)->first();
        if ($transaction) {
            if ($transaction->paymentMethod->method == 'TRANSFER') {
                $paymentMethod = BankAccount::all();
            } elseif ($transaction->paymentMethod->method == 'COD') {
                $paymentMethod = DB::table('site_settings')->pluck('value', 'key');
            }
        } else {
            session()->flash('error', 'Data tidak ditemukan');
            return redirect()->back();
        }

        if ($transaction->statusPesanan->status == 'cancelled') {
            session()->flash('error', 'Pesanan anda sudah dibatalkan');
            return redirect()->back();
        }
        return view('customer.addPaymentImage', compact('transaction','paymentMethod'));
    }

    public function confirmationStoreImage(Request $request, $type, $invoice) {
        $username = Auth::user()->username;
        $customers = DB::table('customers')->where('username', '=', $username)->first();
        $this->validate($request, [
            'image' => 'required|file|image|mimes:jpg,jpeg,png'
        ]);
        $image = new PaymentConfirmation();
        $photo = $request->file('image');
        $image_extension = $photo->extension();
        $image_name = $photo->getClientOriginalName();
        $photo->storeAs('/images/bukti_pembayaran', $image_name, 'public');
        $image->image = $image_name;
        $image->type = $type;
        $image->invoice_number = $invoice;
        $image->customers_id = $customers->id;
        $image->save();
        session()->flash('success', 'Bukti pembayaran berhasil ditambah, silahkan tunggu konfirmasi admin');
        return redirect(route('transaction.show'));
    }

}
