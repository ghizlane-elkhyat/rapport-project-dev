<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('formation_student', function (Blueprint $table) {
            $table->id();

            // Clé étrangère vers students
            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            // Clé étrangère vers formations
            $table->foreignId('formation_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_student');
    }
};
