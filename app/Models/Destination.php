<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'distance',
        'travel_time',
        'description',
        'image_png',
        'image_webp'
    ];
}
