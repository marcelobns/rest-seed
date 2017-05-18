<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Auth', 'middleware'=>'auth:api'], function(){
    Route::get('user', 'ApiController@user');
});
Route::group(['namespace' => 'Api\v1', 'prefix'=>'v1', 'middleware'=>'auth:api'], function(){
    Route::resource('usuarios', 'UsuarioController');
    Route::resource('pessoas', 'PessoaController');
    Route::resource('discentes', 'DiscenteController');
    Route::resource('cursos', 'CursoController');
});
