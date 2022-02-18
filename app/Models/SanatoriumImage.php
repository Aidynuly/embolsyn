<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SanatoriumImage
 *
 * @property int $id
 * @property int|null $sanatorium_id
 * @property string|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumImage whereSanatoriumId($value)
 * @mixin \Eloquent
 * @property string|null $path
 * @method static \Illuminate\Database\Eloquent\Builder|SanatoriumImage wherePath($value)
 */
class SanatoriumImage extends Model
{
    use HasFactory;
}
