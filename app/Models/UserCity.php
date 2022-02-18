<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserCity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCity whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCity whereUserId($value)
 * @mixin \Eloquent
 */
class UserCity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'city_id', 'created_at', 'updated_at',
    ];
}
