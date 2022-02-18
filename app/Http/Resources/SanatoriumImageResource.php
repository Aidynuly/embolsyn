<?php

namespace App\Http\Resources;

use App\Models\SanatoriumImage;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * Class SanatoriumImageResource
 * @package App\Http\Resources
 * @mixin SanatoriumImage
 */
class SanatoriumImageResource extends JsonResource
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
            'id'    =>  $this->id,
            'sanatorium_id' =>  $this->sanatorium_id,
            'image'     =>  $this->image,
        ];
    }
}
