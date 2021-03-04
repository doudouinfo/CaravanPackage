<?php

namespace Caravan\Package\Http\Requests\Package;

use Vanguard\Http\Requests\Request;

class CreatePackageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'package_name' => "required|regex:/^[a-zA-Z'0-9\-_\.]+$/|unique:packages,package_name",
            'package_type' => 'required',
            'package_status' => 'required',
            'category' => 'required',
            'package_destination[]*' => 'required|array',
            'sharing[]*' => 'required|array',
            //'description' => 'required',
            'imageUpload' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            //'galleryUpload.*' => 'required|mimes:jpg,jpeg,png|max:5000'
        ];
    }
}


