<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'address',
        'facebook_url',
        'x_url',
        'youtube_url',
        'linkedin_url',
    ];
}
