<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [

        'subject',
        'image',

    ];
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }



    public function teachers()
    {

        return $this->belongsToMany(Subject::class, 'teacher_subject', 'teacher_id', 'subject_id')
            ->withPivot('preference')->orderBy('preference', 'asc')
            ->as('class');
    }
}
// return $this->roles()
// ->wherePivot('active', 1)
// ->orderByPivot('created_at', 'desc');