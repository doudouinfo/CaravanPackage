<?php

namespace Caravan\Package;

use Illuminate\Database\Eloquent\Model;

class DeparturePrices extends Model
{
    protected $table = 'departure_prices';
    public $timestamps = false;
    protected $fillable = [
        'departure_id','single_price','double_price','triple_price','family_price',
        'children_price_type',
        'children_price_1','children_age_1','children_price_2','children_age_2','children_price_3','children_age_3', 'baby_price',
        'commission_type',
        'adult_commission', 'children_commission_1','children_commission_2','children_commission_3','baby_commission',
        'rooms_type',
        'cancelable','penalty_type','cancellation_policy','deadline','extras'
    ];

    protected $casts = [
        'rooms_type' => 'array',
        'cancellation_policy' => 'array',
        'extras' => 'array'
    ];

    public function setPropertiesAttribute($value)
    {
        $rooms_type = [];
        foreach ($value as $array_item) {
            $rooms_type[] = $array_item;
        }
        $this->attributes['rooms_type'] = json_encode($rooms_type);

        $cancellation_policy = [];
        foreach ($value as $array_item) {
            $cancellation_policy[] = $array_item;
        }
        $this->attributes['cancellation_policy'] = json_encode($cancellation_policy);

        $extras = [];
        foreach ($value as $array_item) {
            $extras[] = $array_item;
        }
        $this->attributes['extras'] = json_encode($extras);
    }
}
