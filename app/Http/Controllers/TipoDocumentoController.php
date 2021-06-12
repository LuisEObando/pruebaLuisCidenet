<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use APP\Models\TipoDocumento;
use Illuminate\Http\{Request, Response};
use Illuminate\Database\Eloquent\Model;

//Función para traer el listado de documentos de esta tabla para mostrarlos en la lista inteligente del formulario
class TipoDocumentoController extends Controller
{
    public function consultaDocumentos(){
        $documentos = Documentos::all();

        $data = array();
        foreach($documentos as $documento){
            $dataTemp = array('id'=>$documento->id,'documento'=>$documento->documento);
            $data[]=$dataTemp;
        }
        if(!empty($documentos))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    
}
