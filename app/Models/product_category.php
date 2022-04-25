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
        return $this->hasMany(product::class, 'category_id', 'id');
    }
}
