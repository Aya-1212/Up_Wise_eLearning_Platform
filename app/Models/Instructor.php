<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'image',
        'specialty_id',
        'linkedin_url',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Speciality::class);
    }
}
