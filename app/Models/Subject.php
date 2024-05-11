<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $fillable =[

        'subject',
        'subImage',
        
    ];



    public function teachers(){

        return $this->belongsToMany(Teacher::class, 'teacher_subject', 'teacher_id', 'subject_id');
    
    
    }
}


