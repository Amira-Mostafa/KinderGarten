<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'name',
        'email',
        'fb',
        'twitter',
        'insta',
        'image',
        'active',

    ];

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    public function subjects()
    {


        return $this->belongsToMany(Subject::class, 'teacher_subject', 'teacher_id', 'subject_id')
            ->withPivot('preference')->orderBy('preference', 'asc')
            ->as('class');
    }




    //->orderBy('teacher_subject.preference', 'desc');














}
