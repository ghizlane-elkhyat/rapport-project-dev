<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'student_id',
        'formation_id',
        'date_debut',
        'date_fin',
        'total_seances',
        'seances_assistees',
        'taux_presence',
        'moyenne_exercices',
        'moyenne_examen',
        'modules_termines',
        'modules_en_cours',
        'appreciation_generale',
        'points_forts',
        'points_a_ameliorer',
        'recommandations',
        'chemin_pdf',
        'date_generation',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
