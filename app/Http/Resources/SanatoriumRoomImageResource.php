<?php

namespace App\Http\Resources;

use App\Models\SanatoriumRoomImage;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * Class SanatoriumRoomImageResource
 * @package App\Http\Resources
 * @mixin SanatoriumRoomImage
 */
class SanatoriumRoomImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'image' =>  $this->image,
        ];
    }
}
