<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = ['type', 'description', 'price_kg', 'price_satuan', 'is_promo', 'promo_name', 'promo_code','promo_price'];
}
