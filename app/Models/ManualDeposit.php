<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualDeposit extends Model
{
    use HasFactory;

    public function payment_method(){
        return $this->belongsTo(PaymentMethod::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
