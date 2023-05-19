<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteParts extends Model
{
    use HasFactory;

    protected $fillable = ['key','value'];
    protected $tableName = 'website_parts';

}
