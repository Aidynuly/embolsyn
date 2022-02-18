<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SanatoriumRoomImage
 *
 * @property int $id
 * @property int|null $sanatorium_room_id
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoomImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoomImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoomImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoomImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoomImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoomImage whereSanatoriumRoomId($value)
 * @mixin \Eloquent
 * @property string $path
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumRoomImage wherePath($value)
 */
class SanatoriumRoomImage extends Model
{
    use HasFactory;
}
