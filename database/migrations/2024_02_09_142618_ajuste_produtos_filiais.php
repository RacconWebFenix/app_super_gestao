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
        // criar tabelas filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        // criar tabelas auxiliar
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            // colunas que variam de filiais
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            // criar os relacionamentos muitos para muitos foreign keys constrains
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
        // refact produtos
        //remover colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            // colunas que variam de filiais
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // adicionar primeiro as colunas
        Schema::table('produtos', function (Blueprint $table) {
            // colunas que variam de filiais
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        // é necessario sempre removr a referencia antes de remover a tabela
        Schema::table('produto_filiais', function (Blueprint $table) {
            // remove fk
            $table->dropForeign('produto_filiais_filial_id_foreign'); // [tabela]_[coluna]
            // remove column
            $table->dropColumn('filial_id'); // [coluna]
            $table->dropForeign('produto_filiais_produto_id_foreign'); // [tabela]_[coluna]
            // remove column
            $table->dropColumn('produto_id'); // [coluna]

        });
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
};
