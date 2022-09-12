<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        if ($RouteName == 'update') {
            return [
                'email'         => 'unique:user,email',
                'company_id'    => 'exists:company,id',
            ];
        }
    }
}
