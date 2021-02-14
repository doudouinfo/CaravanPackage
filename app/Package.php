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
    protected $fillable = ['package_type','package_name','package_status','categorie','package_destination',
                           'package_description','package_image_vedette','package_gallery','user_id','agency_id','partage','partage_all',
                          ];

    protected $casts = [
        'removable' => 'boolean'
    ];

}
