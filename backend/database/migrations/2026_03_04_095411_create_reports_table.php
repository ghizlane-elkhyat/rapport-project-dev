<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('user_name');
            $table->date('period_start');
            $table->date('period_end');

            $table->integer('total_sessions');
            $table->integer('attended_sessions');
            $table->float('attendance_rate');

            $table->float('avg_exercises_score')->nullable();
            $table->float('avg_exam_score')->nullable();

            $table->integer('completed_modules');
            $table->integer('ongoing_modules');

            $table->text('appreciation');
            $table->text('strengths');
            $table->text('improvements');
            $table->text('recommendations');

            $table->string('pdf_path')->nullable();

            $table->timestamp('generated_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
