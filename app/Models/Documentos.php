<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;
    protected $table='documento';
    protected $connection ='mysql';
    protected $fillable=[
        'id',
        'nombre',
        'deleted_at',
        'created_at',
        'updated_at',	
    ];
}
