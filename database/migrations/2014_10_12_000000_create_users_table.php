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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre', 30);
            $table->string('primer_ap', 20);
            $table->string('segundo_ap', 20);            
            $table->string('correo_inst',45)->unique()->nullable();
            $table->string('correo_personal',45)->unique();
            $table->string('carrera',45)->nullable();
            $table->string('grupo',20)->nullable();
            $table->string('username',45)->unique();
            $table->string('password',80);
            $table->integer('puntos')->default(0);
            $table->string('foto_perfil')->default('Img/FotosPerfil/Pistache/Pistache_7.png');
            $table->string('matricula',11)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->enum('tipo', ['ADMINISTRADOR', 'USUARIO', 'CENTRO DE CANJEO']);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
