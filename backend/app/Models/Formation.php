<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
