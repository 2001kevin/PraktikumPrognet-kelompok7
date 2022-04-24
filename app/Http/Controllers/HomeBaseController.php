<?php

namespace App\Http\Controllers;
use App\Models\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product_category_detail;
use App\Models\product_image;

class HomeBaseController extends Controller
{
    public function home(){
        $product = product::all();
        $product_image = product_image::all();
        $product_category_detail = product_category_detail::all();
        return view('menus.index', compact('product','product_image','product_category_detail'));
    }

    public function viewcategory(product_category_detail $product_category_detail){
       
       $categoryall = $product_category_detail->product()->get();
       $product = product::all();
       $product_image = product_image::all();
       $product_category_detail = product_category_detail::all();

       return view('menus.index', compact('product','product_image','product_category_detail','categoryall')); 
    }
}
