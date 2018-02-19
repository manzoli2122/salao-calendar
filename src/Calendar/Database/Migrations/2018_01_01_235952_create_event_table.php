<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->double('valor', 15, 8);
            $table->string('categoria', 30)->nullable();
            $table->unsignedInteger('tipo_servico_id')->nullable();  
            $table->double('custo_com_produto', 15, 8)->default(0.0);

            $table->integer('desconto_maximo')->default(10);
            $table->integer('desconto_promocional')->default(0);
            $table->integer('duracao_aproximada')->default(30);

            $table->string('observacoes')->nullable();

            $table->integer('porcentagem_funcionario');
            $table->boolean('ativo')->default(true);
           
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
}
