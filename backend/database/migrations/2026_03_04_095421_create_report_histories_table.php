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
        Schema::create('report_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('report_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('pdf_path');
            $table->boolean('sent_by_email')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_histories');
    }
};
