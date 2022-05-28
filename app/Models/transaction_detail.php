<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction_detail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'transaction_details';

    public function transaction(){
        return $this->hasMany(transaction::class, 'transaction_id');
    }

    public function product(){
        return $this->hasMany(product::class, 'product_id');
    }
}
