<?php
use Illuminate\Support\Facades\Route;

    Route::group(['prefix' => 'calendar', 'middleware' => 'auth' ], function(){

        // OPERADORAS
        //Route::get('operadoras/apagados/{id}', 'OperadoraController@showApagado')->name('operadoras.showapagado');     
       // Route::get('operadoras/apagados', 'OperadoraController@indexApagados')->name('operadoras.apagados');        
        //Route::delete('operadoras/apagados/{id}', 'OperadoraController@destroySoft')->name('operadoras.destroySoft');
        //Route::get('operadoras/restore/{id}', 'OperadoraController@restore')->name('operadoras.restore');        
       // Route::post('operadoras/getDatatable/apagados', 'OperadoraController@getDatatableApagados')->name('operadoras.getDatatable.apagados');        
       // Route::post('operadoras/getDatatable', 'OperadoraController@getDatatable')->name('operadoras.getDatatable');        
        //Route::resource('operadoras', 'OperadoraController'); 


        // MODULO CADASTRO
        Route::get('/', 'CalendarController@index')->name('calendar');

    });