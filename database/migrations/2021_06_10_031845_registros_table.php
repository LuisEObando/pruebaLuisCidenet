<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_empleado',false, 20)->comment('será la llave foranea');
            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->date('fecha_ingreso')->comment('Lleva la fecha de ingreso del empleado');
            $table->bigInteger('area',false, 20)->comment('trae el área donde trabaja el empleado');
            $table->foreign('area')->references('id')->on('empleados');
            $table->bigInteger('estado',false, 20)->comment('Será el estado del registro');
            $table->foreign('estado')->references('id')->on('estados');
            $table->dateTime('hora_registro')->comment('Guarda automáticamente la hora en que se crea el registro');
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
