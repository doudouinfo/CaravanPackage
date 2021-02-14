<?php

namespace Caravan\Package;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'packages';
    protected $fillable = ['package_type','package_name','package_status','category','package_destination',
                           'package_description','package_featured_image','package_gallery','user_id','agency_id','sharing','sharing_all',
                          ];

    protected $casts = [
        'removable' => 'boolean'
    ];

}

