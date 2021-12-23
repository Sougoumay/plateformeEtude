<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['nom','description','code','credit'];


    public function users()
    {
        $relation = "";
        if(User::Auth()->status==="teacher"){
            $relation = $this->belongsTo(User::class);
        } elseif (User::Auth()->status==="student"){
            $relation = $this->belongsToMany(User::class);
        }
        return $relation;
    }

    /*public function student()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }*/

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
