<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProduct;

class CompanyProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyProduct::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->admin == 0) abort(401, 'You Aren\'t a System Administrator');

        $request->validate([
            'sell_period' => 'required',
            'product_id' => 'required|exists:product,id',
            'company_id' => 'required|exists:company,id'
        ]);
        
        $CompanyProduct = new CompanyProduct();

        $CompanyProduct->sell_period    = $request['sell_period'];
        $CompanyProduct->product_id     = $request['product_id'];
        $CompanyProduct->company_id     = $request['company_id'];

        $CompanyProduct->save();

        return $CompanyProduct;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CompanyProduct::find($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByCompany($id)
    {
        return CompanyProduct::where('company_id', $id)->get();
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
        if(auth()->user()->admin == 0) abort(401, 'You Aren\'t a System Administrator');
        
        $request->validate([
            'product_id' => 'exists:product,id',
            'company_id' => 'exists:company,id'
        ]);
        
        $CompanyProduct = CompanyProduct::find($id);

        $request['sell_period'] != null && $CompanyProduct->sell_period = $request['sell_period'];
        $request['product_id']  != null && $CompanyProduct->product_id  = $request['product_id'];
        $request['company_id']  != null && $CompanyProduct->company_id  = $request['company_id'];

        $CompanyProduct->save();

        return $CompanyProduct;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CompanyProduct = CompanyProduct::find($id);
        $CompanyProduct->delete();

        return $CompanyProduct;
    }
}
