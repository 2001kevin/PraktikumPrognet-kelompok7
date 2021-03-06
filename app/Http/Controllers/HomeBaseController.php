<?php

namespace App\Http\Controllers;
use App\Models\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product_category;
use App\Models\product_category_detail;
use App\Models\product_image;
use App\Models\product_review;
use App\Models\transaction;
use Illuminate\Support\Facades\Auth;

class HomeBaseController extends Controller
{
    public function home(){
        $products = product::all();
        $product_image = product_image::where('id', 1)->first();
        $product_category_detail = product_category_detail::all();
        $product_category = product_category::all();
        //return $product;
        return view('menus.index', compact('products','product_image','product_category','product_category_detail'));
    }

    public function shopview(){
        $product = product::all();
        $product_image = product_image::all();
        $product_category_detail = product_category_detail::all();
        $categories = product_category::all();
        return view('menus.shop', compact('product','product_image','categories','product_category_detail'));
    }

    public function viewcategory(product_category $product_category){
       
        //show product by category
        $products = $product_category->product()->get();
        $product_image = product_image::all();
        $product_category = product_category::all();;
        return view('menus.index', compact('products','product_image','product_category'));
      
    }

    public function detailproduct(product $product){
        $product_image = product_image::all();
        $product_review = product_review::all();
        $products = product::with('product_image','product_review')->find($product->id);
        $transaction = transaction::all();
        //return $products;
        //$user_id = Auth()->user()->id;
        //return $user_id;
        return view('menus.detailproduct', compact('products','transaction'));
    }

    public function history(){
        $user_id = Auth()->user()->id;
        
        $transaction = transaction::where('user_id', '=', $user_id)->get();;
        return view('listTransaksi', compact('transaction'));
    }
}
