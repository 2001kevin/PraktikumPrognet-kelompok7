<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_category_detail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'product_category_details';
    public function product_category(){
        return $this->belongsTo(product_category::class);
    }

    public function product(){
        return $this->belongsTo(product::class);
    }
}
