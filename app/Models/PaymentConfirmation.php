<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    protected $fillable = ['type', 'image', 'invoice_number', 'customers_id'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customers_id', 'id');
    }
}
