<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_review extends Model
{
    protected $guarded = ['id'];
    protected $table = 'product_reviews';
    use HasFactory;

    public function product(){
        return $this->belongsTo(product::class, 'product_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
