<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['email', 'name','username', 'phone_number','password', 'address'];

    public function transactions() {
        return $this->hasMany(Transaction::class, 'customer_id','id');
    }

    public function paymentConfirmation() {
        return $this->hasMany(PaymentConfirmation::class, 'customers_id','id');
    }
}
