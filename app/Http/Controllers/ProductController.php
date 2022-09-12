<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Product = new Product();

        $Product->name          = $request['name'];
        $Product->description   = $request['description'];
        $Product->model         = $request['model'];
        $Product->brand         = $request['brand'];
        $Product->price         = $request['price'];
        $Product->stock         = $request['stock'];

        $Product->save();

        return $Product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Product = Product::find($id);

        $request['name']        != null && $Product->name           = $request['name'];
        $request['description'] != null && $Product->description    = $request['description'];
        $request['model']       != null && $Product->model          = $request['model'];
        $request['brand']       != null && $Product->brand          = $request['brand'];
        $request['price']       != null && $Product->price          = $request['price'];
        $request['stock']       != null && $Product->stock          = $request['stock'];
        $request['status']      != null && $Product->status         = $request['status'];

        $Product->save();

        return $Product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::find($id);
        $Product->delete();

        return $Product;
    }
}
