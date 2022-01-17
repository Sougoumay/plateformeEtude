<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['nom','description','code','credit','teacher_id'];


    public function userTeachers()
    {
        return $this->belongsTo(User::class,'teacher_id');

    }

    public function userStudents()
    {
        return $this->belongsToMany(User::class, 'user_subjects', 'subject_id','student_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
