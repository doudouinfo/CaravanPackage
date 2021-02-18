<?php

namespace Caravan\Package\Http\Requests\Depature;

use Vanguard\Http\Requests\Request;

class CreateDepatureRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'departure_date' => 'required|date|after:today',
            'return_date' => 'required|date|after:departure_date',
            'number_seats' => 'required|numeric',
            'means_transport' => 'required|array',
            'fee_visa'=>'required_if:visa,==,1',
            'fee_ini' => 'required|regex:/^\d*(\.\d{1,3})?$/',
            'fee_promo' => 'required_if:promotion,==,1',
            'hotel.0.name' => 'required',
            'hotel.0.rate' => 'required|numeric',
            'hotel.0.type_meals' => 'required',
        ];
    }
}

