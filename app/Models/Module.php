<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
    'course_id',
    'week',
    'title',
    'content',
    'file_path',
];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
