<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable =[

        'name',
        'email',
        'fb',
        'twitter',
        'insta',
        'profileImage',
        'active',

    ];

    public function subjects(){

        return $this->belongsToMany(Subject::class, 'teacher_subject', 'teacher_id','subject_id')->withPivot('price', 'ageGroup', 'time', 'capacity');


    }



















}
