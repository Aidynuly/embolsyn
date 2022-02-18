<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BookingUser
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $surname
 * @property string|null $gender
 * @property string|null $date_birth
 * @property string|null $nationality
 * @property string|null $validity
 * @property string|null $iin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereDateBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereIin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereValidity($value)
 * @mixin \Eloquent
 * @property int $booking_id
 * @method static \Illuminate\Database\Eloquent\Builder|BookingUser whereBookingId($value)
 */
class BookingUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'surname', 'iin', 'nationality', 'validity', 'date_birth', 'gender', 'type','booking_id'
    ];
}
