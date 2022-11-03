<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id_paciente');
            $table->integer('fK_id_tipdocumento')->unsigned();
            $table->integer('num_documento');
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
         //   $table->string('foto');
            $table->integer('fK_id_genero')->unsigned();
            $table->integer('fk_id_departamento')->unsigned();
            $table->integer('fk_id_municipio')->unsigned();

            $table->foreign('fK_id_genero')->references('id_genero')->on('generos');
            $table->foreign('fk_id_municipio')->references('id_municipio')->on('municipios');
            $table->foreign('fK_id_tipdocumento')->references('id_tipo_documento')->on('tipos_documento');
            $table->foreign('fk_id_departamento')->references('id_departamento')->on('departamentos');
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
        Schema::dropIfExists('pacientes');
    }
}
