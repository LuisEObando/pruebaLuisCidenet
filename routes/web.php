<?php

use App\Http\Controllers\AreasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\TipoDocumentoController;
use APP\resources\js\LuisComponent;
use App\Models\Areas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', [EmpleadoController::class,'Saludo']);
Route::get('/registro', [RegistrosController::class,'Tabla2']);
Route::get('/dataarray', [EmpleadoController::class,'consultaEmpleados']);
Route::get('/insert/{empleadoRequest}',[EmpleadoController::class,'getInsert']);
Route::get('/dataarrayregistro', [RegistrosController::class,'getInsert']);
Route::get('/consultaareas',[AreasController::class,'consultaAreas']);
Route::get('/consultaestados',[EstadosController::class,'consultaEstados']);
Route::get('/consultapaises',[PaisController::class,'consultaPais']);
Route::get('/consultadocumentos',[TipoDocumentoController::class,'consultaDocumentos']);
Route::get('/consultaregistros',[RegistrosController::class,'consultaRegistros']);
Route::post('/nuevoempleado',[EmpleadoController::class,'postNuevoEmpleado']);
Route::post('/nuevoregistro',[RegistrosController::class,'postNuevoRegistro']);
Route::get('/empleadoslist',[EmpleadoController::class,'getEmpleadosList']);
Route::get('/fechacalculada',[RegistrosController::class,'calculaFechas']);

