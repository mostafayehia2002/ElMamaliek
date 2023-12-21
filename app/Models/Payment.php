<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $table='payments';
    protected $fillable=['payment_name','payment_photo'];

    public function accounts(){
      return  $this->hasMany(Payment_Account::class,'payment_id');
    }
}
