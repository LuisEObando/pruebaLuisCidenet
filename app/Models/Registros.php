<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registros extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='registros';
    protected $connection ='mysql';
    protected $fillable=[
        'id',
        'id_empleado',
        'fecha_ingreso',
        'area',
        'estado',
        'hora_registro',
        'deleted_at',
        'created_at',
        'updated_at',	
    ];
}
