<?php

namespace App\Models;

use App\Http\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Vendor extends User
{
    use HasFactory , Notifiable , HasApiTokens , HasRoles;
    protected $fillable = ['name', 'email', 'phone', 'password', 'store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    
}
