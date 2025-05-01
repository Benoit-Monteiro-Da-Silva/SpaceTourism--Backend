<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrewMember extends Model
{
    protected $fillable = [
        'name',
        'job',
        'bio',
        'image_png',
        'image_webp'
    ];
}
