<?php

namespace App\Http\Controllers;

use App\Models\product_image;
use App\Models\product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::pluck('id', 'product_name');
        $product_image = product_image::all();
        return view('admin.product_image.index', compact('product_image','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = product::pluck('id', 'product_name');
        $product_image = product_image::all();
        return view('admin.product_image.create', compact('product', 'product_image'));
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
            'image_name' => 'required|mimes:png,jpg',
            'product_id' => 'required'
        ]);

        $file_name = $request->image_name->getClientOriginalName();
        $image_name = $request->image_name->storeAs('image', $file_name);
        
        product_image::create([
            'image_name' => $image_name,
            'product_id' => $request->product_id
        ]);

        return redirect('/product_image')->with('success','Product Image Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function show(product_image $product_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function edit(product_image $product_image)
    {
        $product = product::pluck('id', 'product_name');
        $product_image = product_image::find($product_image->id);
        //dd($promimage);
        return view('admin.product_image.edit', compact('product_image','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_image $product_image)
    {
        $request->validate([
            'image_name' => 'required|mimes:png,jpg',
            'product_id' => 'required'
        ]);

        $file_name = $request->image_name->getClientOriginalName();
        $image_name = $request->image_name->storeAs('image', $file_name);
        //$product_image = product_image::find($product_image->id);
        
       product_image::where('id', $request->id)->update([
            'image_name' => $image_name,
            'product_id' => $request->product_id
        ]);

        return redirect('/product_image')->with('success','Product Image Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_image $product_image)
    {
        product_image::destroy($product_image->id);
        return redirect('/product_image')->with('deleted','Image Deleted Successfully');
    }
}
