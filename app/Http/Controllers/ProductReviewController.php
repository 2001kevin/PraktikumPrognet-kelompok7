<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\product_review;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
      public function store(request $request){

        $request->validate([
            'content'=>'required',
            'rate' => 'required|numeric'
        ]);
        //$productId = product::find($product->id);
        product_review::create([
            'product_id' => $request->product_id,
            'user_id' => Auth()->user()->id,
            'content' => $request->content,
            'rate' => $request->rate
        ]);
        return back()->with('success', 'Comment added succesfully');

    }
}
