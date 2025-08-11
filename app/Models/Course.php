<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'price',
        'language',
        'level',
        'category_id',
        'instructor_id',
    ] ;

    public function users(){
        return $this->belongsToMany(User::class,
        'course_user')->withPivot('payment_method')->withTimestamps();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }
     public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

      public function contents(){
        return $this->belongsToMany(Content::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}

