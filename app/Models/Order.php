<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    public $guarded=[];


    public function user(){

        return $this->belongsTo(User::class);
    }
    public function product():belongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function payment(){

        return $this->belongsTo(Payment_Account::class);
    }

}
