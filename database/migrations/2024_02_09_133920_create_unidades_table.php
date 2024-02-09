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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // adicionar relacionamento tabela produtos e unidades
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });


        // adicionar relacionamento tabela produtos_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //  é necessario remover relacionamento tabela produtos_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            // remove fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); // [tabela]_[coluna]
            // remove column
            $table->dropColumn('unidade_id'); // [coluna]

        });
        // é necessario remover relacionamento da tabela produto
        Schema::table('produtos', function (Blueprint $table) {
            // remove fk
            $table->dropForeign('produtos_unidade_id_foreign'); // [tabela]_[coluna]
            // remove column
            $table->dropColumn('unidade_id'); // [coluna]

        });

        Schema::dropIfExists('unidades');
    }
};
