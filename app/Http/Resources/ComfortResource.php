<?php

namespace App\Http\Resources;

use App\Models\Comfort;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * Class ComfortResource
 * @package App\Http\Resources
 * @mixin Comfort
 */
class ComfortResource extends JsonResource
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
            'title' =>  $this->title,
            'image' =>  $this->image,
        ];
    }
}
