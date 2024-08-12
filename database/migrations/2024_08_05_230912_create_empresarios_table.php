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
        Schema::create('empresarios', function (Blueprint $table) {
            $table->id();
           $table->string('tlf');
           $table->string('edad');
           $table->string('direccion');
           $table->string('cargo');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->foreignId('empresa_id')->constrained();  
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresarios');
    }
};
