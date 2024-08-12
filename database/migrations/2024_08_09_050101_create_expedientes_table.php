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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('periodo');
            $table->string('sem_tri');
            $table->string('tipo');            
            $table->string('serv_time')->nullable();            
            $table->dateTime('date_ini')->nullable();
            $table->dateTime('date_end')->nullable();

            $table->foreignId('tutor_id')->constrained();
            $table->foreignId('estudiante_id')->constrained()->unique();
            $table->foreignId('empresa_id')->constrained();
            $table->foreignId('carrera_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
