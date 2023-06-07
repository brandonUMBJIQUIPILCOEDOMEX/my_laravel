<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    public function up() : void
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('clave_profesor');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('especialidad');
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('profesores');
    }
}
