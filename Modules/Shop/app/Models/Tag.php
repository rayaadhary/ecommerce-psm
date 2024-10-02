<?php

namespace Modules\Shop\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Shop\Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Shop\Database\Factories\TagFactory;

class Tag extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_tags';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'name'
    ];

    protected static function newFactory(): TagFactory
    {
        return TagFactory::new();
    }

    public function products()
    {
        return $this->belongsToMany('Modules\Shop\Models\Product', 'shop_products_tags', 'tag_id', 'product_id');
    }
}
