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
        'duration',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')
                    ->withPivot('created_at') // agar bisa ambil waktu pendaftaran
                    ->withTimestamps();
    }
    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
    // Relasi ke user

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
    
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }

}
