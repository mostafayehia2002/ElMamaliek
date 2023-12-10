<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_Charge extends Model
{
    use HasFactory;
    protected $table='order_charges';
    protected $guarded=[];
    public function user(){

        return $this->belongsTo(User::class);
    }
    public function product():belongsTo
    {
        return $this->belongsTo(Product_Charge::class,'product_id');
    }
    public function payment(){

        return $this->belongsTo(Payment::class);
    }
}
