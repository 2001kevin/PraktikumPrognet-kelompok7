<?php

namespace App\Http\Controllers;

use App\Models\product_review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(request $request){

        $request->validate([
            'content'=>'required',
            'rate' => 'required|numeric'
        ]);

        product_review::create([
            'product_id' => $request->product_id,
            'user_id' => Auth()->user()->id,
            'content' => $request->content,
            'rate' => $request->rate
        ]);

    }
}
