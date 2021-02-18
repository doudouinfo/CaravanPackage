<?php

namespace Caravan\Package;

use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    protected $table = 'departures';
    protected $fillable = ['package_id','departure_date','return_date','number_seats','means_transport','itinerary','flight_id',
                           'transport','visa','fee_visa','transfer','fee_transfer',
                           'hotel','fee_ini','promotion','fee_promo',
                           'includes','excludes','program','booked_seats','user_id'];

    protected $casts = [
        'hotel' => 'array',
        'program' => 'array',
        'plan_flight' => 'array'
    ];
    public function setHotelAttribute($value)
    {
        // Start Hotel Cleaning Null Values
        $hotel = [];
        foreach ($value as $array_item) {
            if (!is_null($array_item['name']) && !is_null($array_item['rate'] ) && !is_null($array_item['type_meals'])) {
                $hotel[] = $array_item;
            }
        }
        $this->attributes['hotel'] = json_encode($hotel);

    }

    public function setProgramAttribute($value)
    {
        // Start Itinerary Cleaning Null Values
        $program = [];
        foreach ($value as $array_item) {
            if (!is_null($array_item['day']) && !is_null($array_item['description']) && !is_null($array_item['image']) ) {
                $program[] = $array_item;
            }
        }
        $this->attributes['program'] = json_encode($program);

    }

}
