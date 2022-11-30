<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable(false); // Ligacao com a tabele de user um suport esta atrelado a uma aula e uma licao
            $table->uuid('lesson_id')->nullable(false); // Ligacao Indireta com a tabela Lesson
            $table->enum('status', ['P','A','C'])->default('P'); //Enumeracao para Status do Suporte
            $table->text('description');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supports');
    }
}
