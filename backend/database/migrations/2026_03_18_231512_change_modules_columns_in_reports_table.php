<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reports', function (Blueprint $table) {

            $table->text('modules_termines')->nullable()->change();
            $table->text('modules_en_cours')->nullable()->change();

        });
    }

    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {

            $table->integer('modules_termines')->change();
            $table->integer('modules_en_cours')->change();

        });
    }
};
