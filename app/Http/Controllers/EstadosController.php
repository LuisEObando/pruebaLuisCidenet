<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use Illuminate\Http\{Request, Response};
use Illuminate\Database\Eloquent\Model;

class EstadosController extends Controller
{
        //Función para consultar los estados que irán a la lista inteligente del formulario
    public function consultaEstados(){
        $estados = Estados::all();
        
        $data = array();
        foreach($estados as $estado){
            $dataTemp = array('id'=>$estado->id,'name'=>$estado->nombre);
            $data[]=$dataTemp;
        }
        
        if(!empty($estados))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
