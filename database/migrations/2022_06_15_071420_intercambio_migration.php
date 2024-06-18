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
        Schema::create('intercambios',function (Blueprint $table){

            $table->id();

            $table->foreignId('id_usuario')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            
            $table->foreignId('id_centrocanjeo')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_producto'); 
            $table->foreign('id_producto')->references('idproducto')->on('productos')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('puntos_descontados');

            $table->date('fecha');

            $table->enum('estado', ['Pendiente', 'Realizado'])->default('Pendiente');

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
