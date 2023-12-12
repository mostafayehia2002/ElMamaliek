<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function orders(){

        return $this->hasMany(Order::class,'product_id');

    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
