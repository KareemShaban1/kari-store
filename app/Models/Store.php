<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Store extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    //// defaults
    // protected $connection = 'mysql';
    // protected $table = 'stores';
    // protected $primaryKey ='id';
    // public $incrementing = true;
    // public $timestamps = true;
    // const   CREATED_AT ='created_at';
    // const   UPDATED_AT ='updated_at';

    protected $fillable = [
        'name', 'description', 'logo_image', 'cover_image', 'slug', 'status','percent',
        'phone_number','governorate','city','neighborhood','street_address','category_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getLogoImageUrlAttribute()
    {
        if (!$this->logo_image) {
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if (Str::startsWith($this->logo_image, ['http://', 'https://'])) {
            return $this->logo_image;
        }
        return 'storage/' . $this->logo_image;
    }

    public function getCoverImageUrlAttribute()
    {
        if (!$this->cover_image) {
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if (Str::startsWith($this->cover_image, ['http://', 'https://'])) {
            return $this->cover_image;
        }
        return 'storage/' . $this->cover_image;
    }
}
