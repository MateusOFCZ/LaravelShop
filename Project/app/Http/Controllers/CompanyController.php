<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {        
        $Company = new Company();

        $Company->address   = $request['address'];
        $Company->phone     = $request['phone'];
        $Company->email     = $request['email'];

        $Company->save();

        return $Company;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Company::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CompanyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {        
        $Company = Company::find($id);

        $request['address'] != null && $Company->address    = $request['address'];
        $request['phone']   != null && $Company->phone      = $request['phone'];
        $request['email']   != null && $Company->email      = $request['email'];
        $request['status']  != null && $Company->status     = $request['status'];

        $Company->save();

        return $Company;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Company = Company::find($id);
        $Company->delete();

        return $Company;
    }
}
