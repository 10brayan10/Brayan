<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('servicio.registro');
});
Route::get('/cuentas', function () {
    return view('servicio.cuentas');
});
Route::get('/consultas', function () {
    return view('servicio.php.consultas');
});

////////////////////////////////////////////
Route::get('/dia', function () {
    return view('servicio.php.dia');
});
Route::post('/newusuarios', function () {
    return view('servicio.php.newusuarios');
});
Route::get('/pagina', function () {
    return view('servicio.php.pagina');
});
Route::post('/periodo', function () {
    return view('servicio.php.periodo');
});


Route::post('/valida', function () {
    return view('servicio.php.valida');
});
Route::get('/asistencia', function () {
    return view('servicio.php.asistencia');
});

