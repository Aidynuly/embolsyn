<?php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\Sanatorium;
use App\Models\SanatoriumImage;
use App\Models\SanatoriumRoom;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SanatoriumResource
 * @package App\Http\Resources
 * @mixin Sanatorium
 */
class SanatoriumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city' => City::whereId($this->city_id)->value('name'),
            'title' => $this->title,
            'description' => $this->description,
            'address' => $this->address,
            'phone' => $this->phone,
            'site' => $this->site,
            'email' => $this->email,
            'images' => SanatoriumImage::whereSanatoriumId($this->id)->get('path')->toArray(),
            'rooms' => $this->room,
        ];
    }
}
