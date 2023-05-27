<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $timestamps = false;
    public function attribute_value(): HasMany
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id', 'id');
    }
}
