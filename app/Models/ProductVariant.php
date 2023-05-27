<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $table = 'product_variant';
    protected $fillable = [
        'product_id', 'attribute_id', 'attribute_value_id', 'sku', 'quantity',
        'price', 'compare_price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }
    public function attribute_value()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id', 'id');
    }
}
