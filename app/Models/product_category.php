<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'product_categories';
    
    public function product_category_details(){
        return $this->hasMany(product_category_detail::class);
    }
}
