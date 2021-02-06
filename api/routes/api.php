<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/',function(){
    return "Test api";
});

Route::get('/cidades', 'CidadesController@index');
Route::get('/estados', 'EstadosController@index');
Route::get('/previsao', 'PrevisaoClimaController@index');


Route::get('/maior-temperatura', 'MaiorTemperaturaController@index');
Route::get('/menor-temperatura', 'MenorTemperaturaController@index');
Route::get('/previsao/{iDcidade}/{dias}', 'PrevisaoClimaController@list');

