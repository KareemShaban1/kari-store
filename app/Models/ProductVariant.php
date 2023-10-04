<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class ProductVariant extends Model
{
    use HasFactory;
    protected $table = 'product_variant';
    protected $fillable = [
        'product_id', 'attribute_id', 'attribute_value_id', 'sku', 'quantity',
        'price', 'compare_price', 'image','store_id'
    ];



    // Acessories definition =>  public function get...Attribute(){}

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('thumbnail/products_variants/' . $this->image);
    } // $variant->image_url


    // Relationsips

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
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}