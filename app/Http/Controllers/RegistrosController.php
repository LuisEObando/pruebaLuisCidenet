<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\{Request,Response};
use App\Models\Registros;
use DateTime;
use DateTimeZone;
use Faker\Provider\DateTime as ProviderDateTime;
use Illuminate\Support\Facades\Date;

class RegistrosController extends Controller
{
    public function Tabla2()
    {
        return view('registro');
    }
    public function postNuevoRegistro(Request $request){

        //dd($request->all());
        if(!empty($request->getId) && !empty($request->getFecha)){
           
           $empleado= Empleados::select('id')->where('numero_identificacion',$request->getId)->first();
        
            
            //$dataCountry= Empleados::where('id',$request->getnumid)->first();
//Estado y area vienen automáticos
            $dateTime = new DateTime();
            
            $registra = new Registros();
            $registra->id_empleado =$empleado->id;
            $registra->fecha_ingreso = $request->getFecha;
            $registra->area = $request->getarea;
            $registra->estado = $request->getestado;
            $registra->hora_registro = $dateTime->format('Y-m-d H:i:s') ;
            
            $registra->save();

            return response()->json(['status' => Response::HTTP_OK,'message' => 'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
    public function getdataRegistro()
    {
        $data=array('numero_registro'=>'01',
                    'id_empleado'=>'01',
                    'fecha_ingreso'=>'06/06/2021',
                    'area'=>'Operación',
                    'estado'=>'Activo',
                    'hora_registro' => '06/06/2021 02:58:38',
                    '');

        if(!empty($data))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function getInsert(Request $request)
    {

        $fechaActual=date("Y-m-d");
        $fechaCalculada=date("Y-m-d",strtotime($fechaActual."- 30 days"));
        
        

        $dateTime = new DateTime();
        

        $registro = new Registros();
        $registro->id_empleado= 1;
        $registro->fecha_ingreso = date("Y-m-d");
        $registro->area='Operación';
        $registro->estado='Activo';
        $registro->hora_registro=$dateTime->format('Y-m-d H:i:s'); 
        $registro->save();
     
        
        if(!empty($registro))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$registro,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        };

        
    }
    //Función para traer los datos de la tabla registros para llevarlos a la lista inteligente del formulario
    public function calculaFechas(){
        $fechaActual=date("Y-m-d");
        $fechaCalculada=date("Y-m-d",strtotime($fechaActual."- 30 days"));

        $data=array('fechaInicial'=>$fechaCalculada,'fechaFinal'=>$fechaActual);

        return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
    }
    
    public function consultaRegistros(){
        $registros = Registros::all();

        $data = array();
        foreach($registros as $registro){
            $dataTemp = array('ID Empleado'=>$registro->id_empleado,
                            'Fecha Ingreso'=>$registro->fecha_ingreso,
                            'Area'=>$registro->area,
                            'Estado'=>$registro->estado,
                            'Hora Registro'=>$registro->hora_registro);
            $data[]=$dataTemp;
        }
        if(!empty($registros))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }


    }
 }
