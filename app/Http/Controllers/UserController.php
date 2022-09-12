<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $User = new User();

        $User->first_name   = $request['first_name'];
        $User->last_name    = $request['last_name'];
        $User->email        = $request['email'];
        $User->password     = Hash::make($request['password']);
        $User->status       = $request['status']                    ?? 'enabled';
        $User->admin        = $request['admin']                     ?? false;
        $User->company_id   = $request['company_id']                ?? null;

        $User->save();

        return $User;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
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
        $User = User::find($id);

        $request['first_name']  != null && $User->first_name   = $request['first_name'];
        $request['last_name']   != null && $User->last_name    = $request['last_name'];
        $request['email']       != null && $User->email        = $request['email'];
        $request['password']    != null && $User->password     = Hash::make($request['password']);
        $request['status']      != null && $User->status       = $request['status'];
        $request['admin']       != null && $User->admin        = $request['admin'];
        $request['company_id']  != null && $User->company_id   = $request['company_id'];

        $User->save();

        return $User;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();

        return $User;
    }
}
