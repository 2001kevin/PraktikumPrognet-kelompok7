<?php

namespace App\Http\Controllers;

use App\Models\product_category;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_category = product_category::all();
        return view('admin.product_category.index',compact('product_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_category.create');
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
            'category_name' => 'required',
        ]);

        product_category::create([
            'category_name' => $request->category_name
        ]);
        return redirect('/category')->with('success','Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function show(product_category $product_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function edit(product_category $product_category)
    {
        $product_category = product_category::find($product_category->id);
        return view('admin.product_category.edit', compact('product_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_category $product_category)
    {
         $request->validate([
            'category_name' => 'required',
        ]);
        $product_category = product_category::find($product_category->id);
        product_category::where('id', $product_category->id)->update([
            'category_name' => $request->category_name
        ]);
        return redirect('/category')->with('success','Category Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_category $product_category)
    {
        product_category::destroy($product_category->id);
        return redirect('/category')->with('deleted', 'Category Deleted Successfully');
    }
}
