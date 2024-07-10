<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'price',
        'ageGroup',
        'start',
        'end',
        'capacity',
        'active'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
