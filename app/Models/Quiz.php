<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'total_marks',
        'passing_mark',
        'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function questions(){
        return $this->belongsToMany(Question::class);
    }

    public function attempts(){
        return $this->belongsToMany(QuizAttempt::class);
    }

}
