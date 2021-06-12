<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\{Request, Response};
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Cloner\Data;

class AreasController extends Controller
{
//Consulta para traer las áreas de trabajo a la lista ingeligente del formulario para crear nuevo empleado
    public function consultaAreas(){

        $areas = Areas::all();

        $data=array();
        foreach($areas as $area){
            $dataTemp=array('id'=>$area->id,'nombre' =>$area->nombre);
            $data[]=$dataTemp;
            
        }
        if(!empty($areas))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        
        

        
    }
}
