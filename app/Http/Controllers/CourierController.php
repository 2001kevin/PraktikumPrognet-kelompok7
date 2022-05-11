<?php

namespace App\Http\Controllers;

use App\Models\courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courier = courier::all();
        return view('admin.courier.index', compact('courier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courier.create');
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
            'courier' => 'required',
        ]);

        courier::create([
            'courier' => $request->courier
        ]);
        return redirect('/courier')->with('success','Courier Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(courier $courier)
    {
        $courier = courier::find($courier->id);
        return view('admin.courier.edit', compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, courier $courier)
    {
        $request->validate([
            'courier' => 'required',
        ]);
        $courier = courier::find($courier->id);
        courier::where('id', $courier->id)->update([
            'courier' => $request->courier
        ]);
        return redirect('/courier')->with('success','Courier Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(courier $courier)
    {
        courier::destroy($courier->id);
        return redirect('/courier')->with('deleted', 'Courier Deleted Successfully');
    }
}
