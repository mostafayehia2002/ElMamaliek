<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['country_id','photo','payment_name','account_number'];
    public function country(){

        return  $this->belongsTo(Country::class);
    }

    public function orders(){

        return $this->hasMany(Payment::class,'payment_id');
    }

    public function orderCharges(){
        return $this->hasMany(Payment::class,'payment_id');
    }
}
