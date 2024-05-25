<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [

        'subject',
        'subImage',

    ];



    public function teachers()
    {

        return $this->belongsToMany(Subject::class, 'teacher_subject', 'teacher_id', 'subject_id')
            ->withPivot('preference', 'price', 'ageGroup', 'time', 'capacity', 'active')->orderBy('preference', 'asc')
            ->as('class');
    }
}
// return $this->roles()
// ->wherePivot('active', 1)
// ->orderByPivot('created_at', 'desc');