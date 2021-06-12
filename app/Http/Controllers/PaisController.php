<?php

namespace App\Http\Controllers;


use App\Models\Paises;
use Illuminate\Http\{Request,Response};
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Cloner\Data;

class PaisController extends Controller
{   //Consulta para traer en un json los campos del país de la base de datos para llevarlos a la lista inteligente
    public function consultaPais(){
        $paises = Paises::all();

        $data = array();
        foreach($paises as $pais){
            $dataTemp=array('id'=>$pais->id,'nombre'=>$pais->nombre,'extencion'=>$pais);
            $data[]=$dataTemp;
        }
        if(!empty($paises))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        
    }
}
