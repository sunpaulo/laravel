<?php

namespace App\Models;

use App\Models\Physical\Category as Physical;

/**
 * Class Category
 * @package App\Models
 * @property $name string
 */
class Category extends AbstractModel
{
    use Physical;

    protected $table = 'category';

    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_to_category');
    }
}
