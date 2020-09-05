<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['invoice_number', 'price_total', 'total_berat', 'total_satuan', 'customer_id', 'paket_id', 'statusPesanan_id', 'paymentStatus_id', 'paymentMethod_id'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function paket() {
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }
    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class, 'paymentMethod_id', 'id');
    }
    public function paymentStatus() {
        return $this->belongsTo(PaymentStatus::class, 'paymentStatus_id');
    }
    public function statusPesanan() {
        return $this->belongsTo(StatusPesanan::class, 'statusPesanan_id', 'id');
    }

}
