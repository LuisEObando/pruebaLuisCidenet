<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->text('primer_apellido',20)->comment('Primer apellido del empleado');
            $table->text('segundo_apellido',20)->nullable()->comment('Segundo apellido del empleado');
            $table->text('primer_nombre',20)->comment('Primer nombre del empleado');
            $table->text('otros_nombres',50)->nullable()->comment('Seguno u otros nombres del empleado');
            $table->bigInteger('pais_empleo',false, 20)->comment('Llave foranea de País donde realizará sus labores');
            $table->foreign('pais_empleo')->references('id')->on('pais');
            $table->bigInteger('tipo_identificacion',false, 20)->comment('Tipo de documento del empleado');
            $table->foreign('tipo_identificacion')->references('id')->on('documento');
            $table->string('numero_identificacion',20)->comment('numero de la identificación del empleado'); #Esta faltó
            $table->string('email',60)->comment('Email generado automáticamente (p_nombre+p_apellido+id+dominio+pais)');
            $table->bigInteger('area',false, 20)->comment('trae el área donde trabaja el empleado');
            $table->foreign('area')->references('id')->on('areas');
            $table->softDeletes();
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
}