<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'password',
    ];

    public function messages(){
       return $this->hasMany(Message::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,
         'course_user')->withPivot('payment_method')->withTimestamps();
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    public function quizAttempts(){
        return $this->hasMany(QuizAttempt::class);
    }

    public function contents(){
        return $this->
        belongsToMany(Content::class,'content_user')
        ->withPivot('is_finished')->withTimestamps();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
