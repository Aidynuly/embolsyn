<?php

namespace App\Http\Resources;

use App\Models\Comfort;
use App\Models\Sanatorium;
use App\Models\SanatoriumComfort;
use App\Models\SanatoriumRoom;
use App\Models\SanatoriumRoomImage;
use DB;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * Class SanatoriumRoomResource
 * @package App\Http\Resources
 * @mixin SanatoriumRoom
 */
class SanatoriumRoomResource extends JsonResource
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
            'sanatorium'    =>  Sanatorium::whereId($this->sanatorium_id)->value('title'),
            'price'     =>  $this->price,
            'count_adults'  =>  $this->count_adults,
            'count_children'    =>  $this->count_children,
            'images'       =>   SanatoriumRoomImageResource::collection(SanatoriumRoomImage::whereSanatoriumRoomId($this->id)->get()),
            'comforts'      =>  DB::table('sanatorium_rooms')->join('sanatorium_comforts', 'sanatorium_rooms.id', 'sanatorium_comforts.sanatorium_room_id')
                                ->join('comforts', 'sanatorium_comforts.comfort_id', 'comforts.id')
                                ->where('sanatorium_rooms.id', $this->id)
                                ->select('comforts.id', 'comforts.title', 'comforts.image')->get()
        ];
    }
}
