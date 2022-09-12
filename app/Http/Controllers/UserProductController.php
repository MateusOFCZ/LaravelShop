<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProduct;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserProduct::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $UserProduct = new UserProduct();

        $UserProduct->product_id    = $request['product_id'];
        $UserProduct->user_id       = $request['user_id'];

        $UserProduct->save();

        return $UserProduct;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return UserProduct::find($id);
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
        $UserProduct = UserProduct::find($id);

        $request['status']      != null && $UserProduct->status        = $request['status'];
        $request['product_id']  != null && $UserProduct->product_id    = $request['product_id'];
        $request['user_id']     != null && $UserProduct->user_id       = $request['user_id'];

        $UserProduct->save();

        return $UserProduct;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $UserProduct = UserProduct::find($id);
        $UserProduct->delete();

        return $UserProduct;
    }
}
