<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'lesson_type',
        'video_content',
        'text_content',
        'content_id',
    ];

    public function content(){
        return $this->belongsTo(Content::class);
    }
}
