<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comfort
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|Comfort newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comfort newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comfort query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comfort whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comfort whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comfort whereTitle($value)
 * @mixin \Eloquent
 * @property string $name
 * @method static \Database\Factories\ComfortFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Comfort whereName($value)
 */
class Comfort extends Model
{
    use HasFactory;

    public $timestamps = false;
}
