<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SanatoriumRoom
 *
 * @property int $id
 * @property int|null $sanatorium_id
 * @property string $title
 * @property int $count_adults
 * @property int $count_children
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom query()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom whereCountAdults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom whereCountChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom whereSanatoriumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom whereTitle($value)
 * @mixin \Eloquent
 * @property int|null $price
 * @property int|null $count
 * @property int|null $free_places
 * @property string|null $from_date
 * @property string|null $to_date
 * @method static \Database\Factories\SanatoriumRoomFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom whereFreePlaces($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoom whereToDate($value)
 */
class SanatoriumRoom extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function sanatorium()
    {
        return $this->belongsTo(Sanatorium::class);
    }

    public function comfort()
    {
        return $this->hasManyThrough( Comfort::class,SanatoriumComfort::class,'sanatorium_room_id','id');

    }
}
