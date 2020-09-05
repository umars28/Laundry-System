<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = ['contact_number', 'email', 'facebook','twiter', 'instagram', 'whatsapp'];
}
