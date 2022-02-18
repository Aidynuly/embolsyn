<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SanatoriumComfort
 *
 * @property int $id
 * @property int|null $sanatorium_room_id
 * @property int|null $comfort_id
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumComfort newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumComfort newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumComfort query()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumComfort whereComfortId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumComfort whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumComfort whereSanatoriumRoomId($value)
 * @mixin \Eloquent
 */
class SanatoriumComfort extends Model
{
    use HasFactory;
}
