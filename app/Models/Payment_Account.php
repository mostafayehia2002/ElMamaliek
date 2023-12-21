<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_Account extends Model
{
    use HasFactory;
    public $table='payment_accounts';
    protected $guarded=[];
    public function payments(){

        return  $this->belongsTo(Payment::class);
    }

    public function orders(){

        return $this->hasMany(Payment_Account::class,'payment_id');
    }

    public function orderCharges(){
        return $this->hasMany(Payment_Account::class,'payment_id');
    }
}
