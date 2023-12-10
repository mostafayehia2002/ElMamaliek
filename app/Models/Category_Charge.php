<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Charge extends Model
{
    use HasFactory;
    protected $table='category_charges';
    protected $guarded=[];
    public function products(){
        return $this->hasMany(Product_Charge::class,'category_id');
    }

}
