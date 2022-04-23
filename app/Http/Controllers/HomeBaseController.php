<?php

namespace App\Http\Controllers;
use App\Models\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product_image;

class HomeBaseController extends Controller
{
    public function home(){
        $product = product::all();
        $product_image = product_image::all();
      
        return view('menus.index', compact('product','product_image'));
    }
}
