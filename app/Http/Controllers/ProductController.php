<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'price'=>'required|numeric',
            'description' => 'required',
            'product_rate' => 'required|numeric',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);

        product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'product_rate' => $request->product_rate,
            'stock' => $request->stock,
            'weight' => $request->weight
        ]);
        return redirect('/product')->with('success','Product Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $product = product::find($product->id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {

        $request->validate([
            'product_name'=>'required',
            'price'=>'required|numeric',
            'description' => 'required',
            'product_rate' => 'required|numeric',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);
        
        product::where('id', $product->id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'product_rate' => $request->product_rate,
            'stock' => $request->stock,
            'weight' => $request->weight
        ]);
        return redirect('/product')->with('success','Product Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $products = product::destroy($product->id);
        return redirect('/product')->with('deleted', 'Product Deleted Successfully');
    }
}
