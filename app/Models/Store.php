<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    //// defaults
    // protected $connection = 'mysql';
    // protected $table = 'stores';
    // protected $primaryKey ='id';
    // public $incrementing = true;
    // public $timestamps = true;
    // const   CREATED_AT ='created_at';
    // const   UPDATED_AT ='updated_at';

    protected $fillable = [
        'name', 'description', 'logo_image', 'cover_image', 'slug', 'active','percent',
        'phone_number','governorate_id','city_id','neighborhood_id','street_address','featured'
    ];

    public function scopeActive($query)
    {
        $query->where('active', '=', 1);
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', '=', 1);
    }



    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'store_id', 'id');
    }
    // public function categories()
    // {
    //     return $this->hasMany(Category::class, 'category_id', 'id');
    // }


    public function categories()
    {
        return $this->belongsToMany(
            Category::class,       // Related Model
            'store_categories',    // Pivot table name
            'store_id',     // Fk in pivot table for the current model
            'category_id',         // Fk in pivot table for the related model
            'id',             // PK for current model
            'id'              // Pk for related model
        );
    }

    public function getLogoImageUrlAttribute()
    {
        if (!$this->logo_image) {
            return 'https://placehold.co/300x300';
        }
        if (Str::startsWith($this->logo_image, ['http://', 'https://'])) {
            return $this->logo_image;
        }
        return 'storage/' . $this->logo_image;
    }

    public function getCoverImageUrlAttribute()
    {
        if (!$this->cover_image) {
            return 'https://placehold.co/300x300';
        }
        if (Str::startsWith($this->cover_image, ['http://', 'https://'])) {
            return $this->cover_image;
        }
        return 'storage/' . $this->cover_image;
    }
}
