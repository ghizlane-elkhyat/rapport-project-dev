<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
