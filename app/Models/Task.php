<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;


/**
 * App\Models\Task
 *
 * @property string $name
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static Builder|Task onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUserId($value)
 * @method static Builder|Task withTrashed()
 * @method static Builder|Task withoutTrashed()
 * @mixin Eloquent
 */
class Task extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'category_id', 'user_id', 'order'];

    /**
     * @return HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
