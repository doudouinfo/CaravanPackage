<?php

namespace Caravan\Package\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\Boolean;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->package_name,
            'status' => $this->package_status,
            'categorie' => $this->category,
            'destination' => $this->package_destination,
            'description' => $this->package_description,
            'image_vedette' => $this->package_featured_image,
            'gallery' => $this->package_gallery,
            'partage' => $this->sharing,
            'partage_all' => (Boolean) $this->sharing_all,
        ];
    }
}
