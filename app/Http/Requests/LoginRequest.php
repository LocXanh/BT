<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'loginID' => 'required|max:255',
            'password' => 'required|min:6',
        ];
    }


    public function massages()
    {
        return [
            'required' => ' Please enter full data',
            'loginID.max' => 'LoginID can not too :max character',
            'password.min' => 'Password must be at least 6 character',

        ];
    }
}
