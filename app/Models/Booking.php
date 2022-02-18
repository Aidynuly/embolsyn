<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booking
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $sanatorium_room_id
 * @property string $status
 * @property string $from_date
 * @property string $to_date
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereSanatoriumRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUserId($value)
 * @mixin \Eloquent
 */
class Booking extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'sanatorium_room_id', 'user_id', 'booked_user_id', 'from_date', 'to_date', 'updated_at', 'created_at'
    ];

    public function room()
    {
        return $this->belongsTo(SanatoriumRoom::class,'id','id','room_id');
    }

    public function users()
    {
        return $this->hasMany(BookingUser::class,'booking_id','id');
    }

    public function days()
    {
        return Carbon::parse($this->from_date)->diffInDays(Carbon::parse($this->to_date));
    }




}
