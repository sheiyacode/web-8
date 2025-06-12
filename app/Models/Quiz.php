<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'week',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
