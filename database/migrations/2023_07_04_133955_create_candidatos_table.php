<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Creates the "candidatos" table in the database.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vacante_id')->constrained()->onDelete('cascade');
            $table->string('cv');
            $table->timestamps();
        });
    }

    /**
     * Drops the "candidatos" table from the database schema if it exists.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
