<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'product_images';

    public function product(){
        return $this->belongsTo(product::class, 'product_id');
    }
}
