<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSettings extends Model
{
    use HasFactory;
    // this table created for 3d party apis such as : pusher 

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'config_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key','value'];

    
}