<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'tutor_id',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class, 'tutor_id');
    }
    // Relasi ke user
    public function users()
    {
        return $this->belongsToMany(User::class,'course_user');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

}
