<?php

namespace Manzoli2122\Salao\Cadastro\Http\Controllers;

use Manzoli2122\Salao\Cadastro\Models\Servico;
use Manzoli2122\Salao\Cadastro\Http\Controllers\Padroes\StandardAtivoController ;
use DataTables;

class ServicoController extends StandardAtivoController
{    

    protected $model;
    protected $name = "Servico";
    protected $view = "cadastro::servicos";
    protected $view_apagados = "cadastro::servicos.apagados";
    protected $route = "servicos";
    protected $logCannel;

    public function __construct(Servico $servico){
        $this->model = $servico;
        $this->middleware('auth');
        $this->logCannel = 'cadastro';
        $this->middleware('permissao:servicos')->only([ 'index' , 'show'  ]) ;        
        $this->middleware('permissao:servicos-cadastrar')->only([ 'create' , 'store']);
        $this->middleware('permissao:servicos-editar')->only([ 'edit' , 'update']);
        $this->middleware('permissao:servicos-soft-delete')->only([ 'destroySoft' ]);
        $this->middleware('permissao:servicos-restore')->only([ 'restore' ]);
        $this->middleware('permissao:servicos-admin-permanete-delete')->only([ 'destroy' ]);
        $this->middleware('permissao:servicos-apagados')->only([ 'indexApagados' , 'showApagado' ]) ;
    }



    
    



}
