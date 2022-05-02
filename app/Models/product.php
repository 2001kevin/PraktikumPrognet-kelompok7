<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product_category;
use App\Models\product_category_detail;

class product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'products';

    public function discount(){
        return $this->hasMany(discount::class);
    }
    public function product_image(){
        return $this->hasMany(product_image::class, 'product_id');
    }
    public function product_category(){
        return $this->belongsToMany(product_category::class, 'product_category_details','product_id', 'category_id')->withPivot('id');
    }
}
