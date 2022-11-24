<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->uuid('module_id')->nullable(false); // A aula pode ter um modulo ou não           
            $table->string('name')->unique(); // Previvir nome de aulas repetidas
            $table->string('url');
            $table->string('description')->nullable();
            $table->string('video')->unique();
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
        Schema::dropIfExists('lessons');
    }
}
