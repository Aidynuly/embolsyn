<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Sanatorium
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $city_id
 * @property string $title
 * @property string $description
 * @property string $address
 * @property string|null $phone
 * @property int|null $price
 * @property string|null $site
 * @property string|null $email
 * @property string|null $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereUpdatedAt($value)
 * @method static \Database\Factories\SanatoriumFactory factory(...$parameters)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SanatoriumRoom[] $rooms
 * @property-read int|null $rooms_count
 * @property int $show_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sanatorium whereShowCount($value)
 */
class Sanatorium extends Model
{
    use HasFactory;

    protected $table = 'sanatoriums';

    public function image()
    {
        return $this->hasMany(SanatoriumImage::class,'sanatorium_id','id');
    }
    public function room()
    {
        return $this->hasMany(SanatoriumRoom::class,'sanatorium_id','id');
    }


}
