<?php

namespace Modules\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shop\Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\UuidTrait;
// use Modules\Shop\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory, UuidTrait;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['parent_id', 'slug', 'name'];

    protected $table = 'shop_categories';

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

    public function children()
    {
        return $this->hasMany('Modules\Shop\Models\Category', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('Modules\Shop\Models\Category', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('Modules\Shop\Models\Category', 'shop_categories_product', 'product_id', 'category_id');
    }
}
