<?php

namespace App\Http\Resources;

use App\Models\Comfort;
use App\Models\Sanatorium;
use App\Models\SanatoriumComfort;
use App\Models\SanatoriumRoom;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * Class SanatoriumComfortResource
 * @package App\Http\Resources
 * @mixin SanatoriumComfort
 */
class SanatoriumComfortResource extends JsonResource
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
            'comforts'  =>  ComfortResource::collection(Comfort::whereId($this->comfort_id)->get())
        ];
    }
}
