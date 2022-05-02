<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'product_categories';
    
    public function product(){
        return $this->belongsToMany(product::class, 'product_category_details', 'category_id', 'product_id')->withPivot('id');
    }
}
