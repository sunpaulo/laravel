<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Physical\Product as Physical;
use Auth;

/**
 * Class Product
 * @package App\Models
 * @property $name string
 * @property $price float
 * @property $manager_id int
 */
class Product extends AbstractModel
{
    use SoftDeletes, Physical;

    protected $table = 'product';

    protected $fillable = ['name', 'price', 'manager_id'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_to_category');
    }

    public function scopeOwnProducts($query)
    {
        return $query->where('manager_id', Auth::id())->orderByDesc($this->getCreatedAtColumn());
    }
}