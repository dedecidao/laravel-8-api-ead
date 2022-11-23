<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Pattern Uuid
            //Criacao da chave estrangeira q tera a informacao do curso atrelado a este modulo
           // $table->foreignId('course_id')->constrained('courses');
                        //Chave nesta tabela        // Restringido a tabela de Cursos
            $table->uuid('course_id')->nullable(false);            
            $table->string('name');
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
        Schema::dropIfExists('modules');
    }
}
