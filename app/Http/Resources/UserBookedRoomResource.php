<?php

namespace App\Http\Resources;

use App\Models\BookingUser;
use App\Models\SanatoriumRoom;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SanatoriumRoomResource
 * @package App\Http\Resources
 * @mixin Booking
 */
class UserBookedRoomResource extends JsonResource
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
            'sanatorium_room' => new SanatoriumRoomResource(SanatoriumRoom::find($this->sanatorium_room_id)),
            'user' => User::find($this->user_id),
            'booked_user_id' => BookingUser::find($this->booked_user_id),
        ];
    }
}
