<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['nom','description','points'];

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }

}
