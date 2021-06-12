<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request,Response};
use App\Models\{Empleados,Paises};
use Illuminate\Database\Eloquent\Model;

class EmpleadoController extends Controller
{   
    //Llamamos la vista
    public function Saludo()
    {
        return view('luis');
    }

    public function postNuevoEmpleado(Request $request){
        if(!empty($request->getpApellido) && !empty($request->getpNombre) && !empty( $request->getpaise) && !empty($request->gettipoid) &&  !empty($request->getareatr)){
            
            $dataCountry= Paises::where('id',$request->getpaise)->first();

            $persona = new Empleados();
            $persona->primer_apellido = $request->getpApellido;
            $persona->segundo_apellido = $request->getsApellido;
            $persona->primer_nombre = $request->getpNombre;
            $persona->otros_nombres = $request->getsNombre;
            $persona->pais_empleo = $request->getpaise;
            $persona->tipo_identificacion = $request->gettipoid;
            $persona->numero_identificacion = $request->getnumid;
            $persona->email =strtolower($request->getpNombre.'.'. $request->getpApellido.'.'. $request->getnumid.'@cidenet.com.'.$dataCountry->extencion);
            $persona->area = $request->getareatr;
            $persona->save();

            return response()->json(['status' => Response::HTTP_OK,'message' => 'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function getDataEmpleado()
    {
        $data=array('id'=>1,
                    'primer_apellido'=>'Obando',
                    'segundo_apellido'=>'Bonilla',
                    'primer_nombre'=>'Luis',
                    'otros_nombres'=>'Eduardo',
                    'pais_empleo'=>'Colombia',
                    'tipo_identificacion' =>'Cédula de Ciudadanía',
                    'numero_identificacion' =>'1105614452',
                    'email' => 'luisobando1@cidenet.com.co',
                    'area' => 'Operación',
                    '');
                    
        if(!empty($data))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
//Función de prueba para insertar datos (no se usa en el sistema)
    public function getInsert(Request $request, $empleadoRequest)
    {
        $empleado = new Empleados();
        $empleado->id=1;
        $empleado->primer_apellido= 'Obando';
        $empleado->segundo_apellido = 'Bonilla';
        $empleado->primer_nombre = 'Luis';
        $empleado->otros_nombres = 'Eduardo';
        $empleado->pais_empleo='Colombia';
        $empleado->tipo_identificacion ='Cédula de Ciudadanía';
        $empleado->numero_identificacion= 1105614452;
        $empleado->email= 'luisobando1@cidenet.com.co';
        $empleado->area = 'Operación';
        $empleado->save();

        #$queryEmpleado = Empleados::where('nombre','Luis')->first();

        if(!empty($empleado))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$empleado,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
    }
    //Función que permite la consulta de la base de datos para visualizarlos en la tabla de la pagina de inicio
    public function consultaEmpleados(){
        $empleados = Empleados::all();
       # $data = array();

        foreach($empleados as $empleado){
            $dataTemp = array('id'=>$empleado->id,
                            'primer_apellido'=>$empleado->primer_apellido,
                            'segundo_apellido'=>$empleado->segundo_apellido,
                            'primer_nombre'=>$empleado->primer_nombre,
                            'otros_nombres'=>$empleado->otros_nombres,
                            'pais_empleo'=>$empleado->pais->nombre,
                            'tipo_identificación'=>$empleado->identificacion->documento,
                            'numero_identificacion'=>$empleado->numero_identificacion,
                            'correo_electronico'=>strtolower($empleado->primer_nombre.'.'.$empleado->primer_apellido.$empleado->numero_identificacion.'.@cidenet.com.'.$empleado->pais->extencion), //Construcción del correo electrónico con los parámtros requeridos
                            'area'=>$empleado->areaEmpleado->nombre);
                            
                            
                            
            $data[]=$dataTemp;
        }
        if(!empty($empleados))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
            }
    }

    
    public function getEmpleadosList()
    {
        $empleados = Empleados::select('numero_identificacion','primer_apellido','primer_nombre','area')->get();
        $data=array();
        foreach ($empleados as $empleado ) {
            $dataTemp=array('id'=>$empleado->numero_identificacion,'name'=>$empleado->primer_apellido.' '.$empleado->primer_nombre,'area'=>$empleado->area);
            $data[]=$dataTemp;
        }

        if(!empty($empleados))
        {
            return response()->json(['status'=>Response::HTTP_OK,'data'=>$data,'menssage'=>'Respuesta Correcta'],Response::HTTP_OK);
        }else{
            return response()->json(['status'=>Response::HTTP_UNPROCESSABLE_ENTITY,'menssage'=>'Respuesta Incorrecta'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }

    }
}
