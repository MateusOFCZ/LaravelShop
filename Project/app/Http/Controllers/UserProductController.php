<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProductRequest;
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
     * @param  App\Http\Requests\UserProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserProductRequest $request)
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByUser($id)
    {
        return UserProduct::where('user_id', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProductRequest $request, $id)
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
