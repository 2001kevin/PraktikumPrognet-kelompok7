<?php

namespace App\Http\Controllers;

use App\Models\discount;
use App\Models\product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::pluck('id','product_name');
        $discount = discount::all();
        return view('admin.discount.index', compact('product', 'discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $product = product::pluck('id', 'product_name');
        $discount = discount::all();
        return view('admin.discount.create', compact('product', 'discount'));
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
            'percentage' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        discount::create([
            'product_id' => $request->product_id,
            'percentage' => $request->percentage,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end
        ]);

        return redirect('/discount')->with('success','Discount Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(discount $discount)
    {
        $discount = discount::destroy($discount->id);
        return redirect('/discount')->with('deleted', 'Discount Deleted Successfully');
    }
}
