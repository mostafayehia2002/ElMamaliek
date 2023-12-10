<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Charge extends Model
{
    use HasFactory;
    protected $table='product_charges';
    protected $guarded=[];
    public function category(){
        return  $this->belongsTo(Category_Charge::class);
    }

    public function order(){

        return $this->hasMany(Product_Charge::class,'product_id');
    }
}
