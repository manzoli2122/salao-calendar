<?php
use Illuminate\Support\Facades\Route;

    Route::group(['prefix' => 'cadastro', 'middleware' => 'auth' ], function(){

        // OPERADORAS
        Route::get('operadoras/apagados/{id}', 'OperadoraController@showApagado')->name('operadoras.showapagado');     
        Route::get('operadoras/apagados', 'OperadoraController@indexApagados')->name('operadoras.apagados');        
        Route::delete('operadoras/apagados/{id}', 'OperadoraController@destroySoft')->name('operadoras.destroySoft');
        Route::get('operadoras/restore/{id}', 'OperadoraController@restore')->name('operadoras.restore');        
        Route::post('operadoras/getDatatable/apagados', 'OperadoraController@getDatatableApagados')->name('operadoras.getDatatable.apagados');        
        Route::post('operadoras/getDatatable', 'OperadoraController@getDatatable')->name('operadoras.getDatatable');        
        Route::resource('operadoras', 'OperadoraController'); 



        // SERVIÇOS
        Route::get('servicos/apagados/{id}', 'ServicoController@showApagado')->name('servicos.showapagado');        
        Route::get('servicos/apagados', 'ServicoController@indexApagados')->name('servicos.apagados');
        Route::delete('servicos/apagados/{id}', 'ServicoController@destroySoft')->name('servicos.destroySoft');
        Route::get('servicos/restore/{id}', 'ServicoController@restore')->name('servicos.restore');
        Route::post('servicos/getDatatable/apagados', 'ServicoController@getDatatableApagados')->name('servicos.getDatatable.apagados');        
        Route::post('servicos/getDatatable', 'ServicoController@getDatatable')->name('servicos.getDatatable');        
        Route::resource('servicos', 'ServicoController');



        // PRODUTOS
        Route::get('produtos/apagados/{id}', 'ProdutoController@showApagado')->name('produtos.showapagado');        
        Route::get('produtos/apagados', 'ProdutoController@indexApagados')->name('produtos.apagados');
        Route::delete('produtos/apagados/{id}', 'ProdutoController@destroySoft')->name('produtos.destroySoft');
        Route::get('produtos/restore/{id}', 'ProdutoController@restore')->name('produtos.restore');
        Route::post('produtos/getDatatable/apagados', 'ProdutoController@getDatatableApagados')->name('produtos.getDatatable.apagados');        
        Route::post('produtos/getDatatable', 'ProdutoController@getDatatable')->name('produtos.getDatatable');        
        Route::resource('produtos', 'ProdutoController'); 


        // MODULO CADASTRO
        Route::get('/', 'CadastroController@index')->name('cadastro');

    });