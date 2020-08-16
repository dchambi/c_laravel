<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->double('costo');
            $table->text('resumen');
            $table->date('estreno');
            $table->timestamps();
            // $table->double('costo');
            //Agregar relacion 1 a Ncon la tabla generos
           // $table->integer('genero_id')->unsigned();
           //
           $table->unsignedBiginteger('genero_id'); 
           $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
           

            //Agregar relacion 1 a Ncon la tabla user
           // $table->integer('user_id')->unsigned();
            $table->unsignedBiginteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
