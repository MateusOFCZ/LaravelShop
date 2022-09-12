<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProductRequest extends FormRequest
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
                'product_id'    => 'required|exists:product,id',
                'user_id'       => 'required|exists:user,id'
            ];
        } else if ($RouteName == 'update') {
            return [
                'product_id'    => 'exists:product,id',
                'user_id'       => 'exists:user,id'
            ];
        }
    }
}
