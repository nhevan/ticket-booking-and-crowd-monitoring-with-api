<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'slogan', 'reg_id', 'barcode'];
}
