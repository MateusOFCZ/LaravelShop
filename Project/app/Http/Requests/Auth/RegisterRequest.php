<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $RouteName = explode('@', \Route::getCurrentRoute()->getActionName())[1];

        if ($RouteName == 'register') {
            return [
                'first_name'    => 'required',
                'last_name'     => 'required',
                'email'         => 'required|unique:user,email',
                'password'      => 'required'
            ];
        }
    }
}
