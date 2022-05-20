<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'transactions';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function courier(){
        return $this->belongsTo(courier::class);
    }

    public function transaction_detail(){
        return $this->hasMany(transaction_detail::class, 'transaction_id');
    }

}
