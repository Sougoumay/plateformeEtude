<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = ['solution','task_id','evaluation','student_id'];

    public function tasks()
    {
       return $this->belongsTo(Task::class);
    }

    public function students()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}
