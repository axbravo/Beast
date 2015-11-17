<?php

namespace App\Http\Requests\System;

use App\Http\Requests\Request;

class UpdateSystemRequest extends Request
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
            'business_name'     =>  'required',
            'ruc'               =>  'required|numeric|digits:11',
            'address'           =>  'required',
            'logo'              =>  'image',
            'favicon'           =>  'image',
        ];
    }
}
