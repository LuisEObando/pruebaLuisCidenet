<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estados extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='estados';
    protected $connection ='mysql';
    protected $fillable=[
        'id',
        'nombre',
        'deleted_at',
        'created_at',
        'updated_at',	
    ];

}
