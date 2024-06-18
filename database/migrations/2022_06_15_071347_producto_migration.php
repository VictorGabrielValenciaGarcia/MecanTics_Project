<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos',function (Blueprint $table){

            $table->id('idproducto');
            $table->string('imagen');
            $table->string('tipo', 30); // Nombre del Producto
            $table->double('precio',5);
            $table->integer('puntos_requeridos');
            $table->integer('cantidad_disponible');
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
        //
    }
};
