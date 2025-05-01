<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_portrait',
        'image_landscape'
    ];
}
