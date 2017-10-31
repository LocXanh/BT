<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployeeRequest extends Request
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
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:employees,id',
            'phone'     => 'required|max:14|unique:employees,id|regex:/[0-9]{1,4}-[0-9]{1,4}-[0-9]{1,4}/',
            'address'   => 'required',
           
        ];
    }

    public function messages(){
        return[
            'name.required'      => 'Please enter name',
            'name.max'           => 'Name can not too :max character',
            'email.required'     => 'Please enter email',
            'avatar.required'    => 'Please add avatar',
            'avatar.image'       => 'Data input to avatar field must be file image',
            'phone.required'     => 'Please enter phone number',
            'phone.max'          => 'Phone number can not too :max character',
            'email.email'        => 'Email field invalids format ',
            'email.unique'       => 'Email already exists',
            'email.max'          => 'Email can not too :max character',
            'phone.unique'       => 'Phone already exists',
            'phone.regex'        => 'Phone field invalids format',
            'address.required'   => 'Please enter address',

        ];
    }
}
