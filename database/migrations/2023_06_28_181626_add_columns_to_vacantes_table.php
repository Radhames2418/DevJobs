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
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string('titulo');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Drop columns from the "vacantes" table.
     *
     * This method drops multiple columns from the "vacantes" table using a closure
     * provided with a Blueprint object. The columns to be dropped are:
     * - titulo
     * - salario_id
     * - categoria_id
     * - ultimo_dia
     * - descripcion
     * - imagen
     * - publicado
     * - user_id
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->dropForeign('vacantes_categoria_id_foreign');
            $table->dropForeign('vacantes_salario_id_foreign');
            $table->dropForeign('vacantes_user_id_foreign');
            $table->dropColumn([
                'titulo',
                'salario_id',
                'categoria_id',
                'empresa',
                'ultimo_dia',
                'descripcion',
                'imagen',
                'publicado',
                'user_id'
            ]);
        });
    }
};
