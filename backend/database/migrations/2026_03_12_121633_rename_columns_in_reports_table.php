<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reports', function (Blueprint $table) {

            $table->renameColumn('period_start', 'date_debut');
            $table->renameColumn('period_end', 'date_fin');

            $table->renameColumn('total_sessions', 'total_seances');
            $table->renameColumn('attended_sessions', 'seances_assistees');
            $table->renameColumn('attendance_rate', 'taux_presence');

            $table->renameColumn('avg_exercises_score', 'moyenne_exercices');
            $table->renameColumn('avg_exam_score', 'moyenne_examen');

            $table->renameColumn('completed_modules', 'modules_termines');
            $table->renameColumn('ongoing_modules', 'modules_en_cours');

            $table->renameColumn('appreciation', 'appreciation_generale');
            $table->renameColumn('strengths', 'points_forts');
            $table->renameColumn('improvements', 'points_a_ameliorer');
            $table->renameColumn('recommendations', 'recommandations');

            $table->renameColumn('pdf_path', 'chemin_pdf');
            $table->renameColumn('generated_at', 'date_generation');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {

            $table->renameColumn('date_debut', 'period_start');
            $table->renameColumn('date_fin', 'period_end');

            $table->renameColumn('total_seances', 'total_sessions');
            $table->renameColumn('seances_assistees', 'attended_sessions');
            $table->renameColumn('taux_presence', 'attendance_rate');

            $table->renameColumn('moyenne_exercices', 'avg_exercises_score');
            $table->renameColumn('moyenne_examen', 'avg_exam_score');

            $table->renameColumn('modules_termines', 'completed_modules');
            $table->renameColumn('modules_en_cours', 'ongoing_modules');

            $table->renameColumn('appreciation_generale', 'appreciation');
            $table->renameColumn('points_forts', 'strengths');
            $table->renameColumn('points_a_ameliorer', 'improvements');
            $table->renameColumn('recommandations', 'recommendations');

            $table->renameColumn('chemin_pdf', 'pdf_path');
            $table->renameColumn('date_generation', 'generated_at');
        });
    }
};
