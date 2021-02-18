<?php

namespace Caravan\Package\Http\Requests\Package;

use Vanguard\Http\Requests\Request;

class UpdatePackageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'package_name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:packages,package_name',
            'package_type' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|'
        ];
    }
}
