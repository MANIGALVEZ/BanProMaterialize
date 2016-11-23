<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');



//Ruta controlador: El usuario por medio del aplicativo espera tener una interfaz que permita registrar su proyecto
Route::resource('proyectos', 'ProyectosController');


//Ruta para dirigir a la interfaz principal de proyectos (todos los proyectos)
Route::get('/proyectosIndex', 'ProyectosController@index');


// Ruta para buscar proyectos por nombre
Route::post('/searchN', 'ProyectosController@searchName');


// Ruta para buscar proyectos por fecha
Route::post('/searchD', 'ProyectosController@searchDate');


// Ruta para buscar y cambiar estado de proyecto en Detalles
Route::post('/resumenP', 'ProyectosController@resumenProyecto');


// Ruta para listar proyectos (El usuario desea poder ver el banco de proyectos en estado: "reclutando")
Route::get('/listarP/{lip}', 'ProyectosController@listarProyecto');


// Detalles proyectos: El gestor por medio del aplicativo podrá tener una opción para ver el detalle completo de un proyecto
Route::get('/show/{id}', 'ProyectosController@show');


// Ruta para dirigir a inscribir proyectos
Route::get('/inscribir/{id}', 'ProyectosController@inscribir');

// Ruta para dirigir a inscribir proyectos desde detalles
Route::get('/vincularce/{id}', 'ProyectosController@vincularce');

// Ruta para dirigir a proyectos inscritos de cada usuario
Route::get('/misproyectos', 'ProyectosController@misproyectos');


// Ruta para actualizar el estado de los proyectos
Route::get('/estadoProyecto', 'ProyectosController@estado');


// Ruta para cargar el resumen de los proyectos
Route::get('/consultaP/{idp}', 'ProyectosController@consultaProyecto');


//Ruta para ver todos los usuarios
Route::get('/usuarios', 'ProyectosController@usuarios');


//Ruta para ver el proyecto asociado que tiene cada usuarios
Route::get('/usuariosshow/{id}', 'ProyectosController@usuariosshow');


//Ruta para eliminar (cambiar a estado: En Banco) proyectos
Route::post('/eliminarP', 'ProyectosController@eliminarProyecto');


//Ruta para dirigir a proyectos en estado: En Banco
Route::get('/proyectosB', 'ProyectosController@proyectosBanco');


//Ruta para ver proyectos solicitando de cada usuario
Route::get('/proyectousuario/{id}', 'ProyectosController@showup');


//Ruta para cambiar de estado el usuario (Reclutado, solicitando, Inactivo)
Route::get('/estProUser', 'ProyectosController@estadoProyectoUsuario');


// Ruta para filtrar por lineas (El gestor podra filtrar los proyectos según las diferentes lineas tecnologicas)
Route::get('/listarL', 'ProyectosController@listarLinea');


// Ruta para agregar un Comentario a un proyecto
Route::post('/comentario/{id}', 'ProyectosController@comentario');


// Ruta para buscar y cambiar estado de proyecto en vista Detalles
Route::post('/resumenPD', 'ProyectosController@resumenProyectoDetalle');


// Ruta para buscar y cambiar estado de proyecto en vista Detalles
Route::get('/registroR/{id}', 'ProyectosController@registroRechazado');


// Ruta para editar desde detalles de proyecto (showp)
Route::post('/editS/{id}', 'ProyectosController@editShow');


// Ruta para editar la imagen desde detalles de proyecto (showp)
Route::post('/editSI/{id}', 'ProyectosController@editShowImagen');