<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paises;
use App\Models\Areas;
use App\Models\Documentos;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleados extends Model
{
    use HasFactory,SoftDeletes;

    #protected $table='personas';
    protected $table='empleados';
    protected $connection ='mysql';
    protected $fillable=[
        'id',
        'primer_apellido',
        'segundo_apellido',
        'primer_nombre',
        'otros_nombres',
        'pais_empleo',
        'tipo_identificacion',
        'numero_identificacion',
        'email',
        'area',
        'deleted_at',
        'created_at',
        'updated_at',	
    ];


    public function pais()
    {
        return $this->hasOne(Paises::class,'id','pais_empleo');
    }
    public function areaEmpleado()
    {
        return $this->hasOne(Areas::class,'id','area');
    }
    public function identificacion()
    {
        return $this->hasOne(Documentos::class,'id','tipo_identificacion');
    }
}
