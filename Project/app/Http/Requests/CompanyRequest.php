<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $RouteName = explode('@', \Route::getCurrentRoute()->getActionName())[1];

        if ($RouteName == 'store') {
            return [
                'address'   => 'required',
                'phone'     => 'required|unique:company,phone',
                'email'     => 'required|unique:company,email'
            ];
        } else if ($RouteName == 'update') {
            return [
                'phone' => 'unique:company,phone',
                'email' => 'unique:company,email',
            ];
        }
    }
}
