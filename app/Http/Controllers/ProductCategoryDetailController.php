<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_category;
use App\Models\product_category_detail;
use Illuminate\Http\Request;

class ProductCategoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_category_detail = product_category_detail::all();
        $product_category = product_category::pluck('id', 'category_name');
        $product = product::pluck('id', 'product_name');
        return view('admin.product_category_details.index', compact('product','product_category_detail','product_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_category = product_category::pluck('id', 'category_name');
        $product = product::pluck('id', 'product_name');
        return view('admin.product_category_details.create', compact('product','product_category'));
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
            'product_id' => 'required',
            'category_id' => 'required'
        ]);

        product_category_detail::create([
            'product_id'=>$request->product_id,
            'category_id'=>$request->category_id
        ]);

        return redirect('/product_category_detail')->with('success', "Detail Category Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_category_detail  $product_category_detail
     * @return \Illuminate\Http\Response
     */
    public function show(product_category_detail $product_category_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_category_detail  $product_category_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(product_category_detail $product_category_detail)
    {
        $product_category = product_category::pluck('id', 'category_name');
        $product = product::pluck('id', 'product_name');
        $product_category_detail = product_category_detail::find($product_category_detail->id);
        return view('admin.product_category_details.edit', compact('product','product_category','product_category_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_category_detail  $product_category_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_category_detail $product_category_detail)
    {
        $request->validate([
            'product_id' => 'required',
            'category_id' => 'required'
        ]);

        product_category_detail::where('id', $product_category_detail->id)->update([
            'product_id'=>$request->product_id,
            'category_id'=>$request->category_id
        ]);

        return redirect('/product_category_detail')->with('success', "Detail Category Edited Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_category_detail  $product_category_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_category_detail $product_category_detail)
    {
        product_category_detail::destroy($product_category_detail->id);
        return redirect('/product_caregory_detail')->with('deleted', 'Detail Category Deleted Successfully');
    }
}
