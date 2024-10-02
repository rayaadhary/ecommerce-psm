<?php

namespace Modules\Shop\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\Factories\AttributeOptionFactory;
// use Modules\Shop\Database\Factories\AttributeOptionFactory;

class AttributeOption extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_attribute_option';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'attribute_id',
        'slug',
        'name',
    ];

    protected static function newFactory(): AttributeOptionFactory
    {
        return AttributeOptionFactory::new();
    }
}
