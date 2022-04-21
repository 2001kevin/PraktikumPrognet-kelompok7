<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'products';

    public function discount(){
        return $this->hasMany(discount::class);
    }
    public function product_image(){
        return $this->hasMany(product_image::class);
    }
}
