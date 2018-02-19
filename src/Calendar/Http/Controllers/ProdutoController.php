<?php

namespace Manzoli2122\Salao\Cadastro\Http\Controllers;

use Manzoli2122\Salao\Cadastro\Models\Produto;
use Manzoli2122\Salao\Cadastro\Http\Controllers\Padroes\StandardAtivoController ;


class ProdutoController extends StandardAtivoController
{

    

    protected $model;
    protected $name = "Produto";
    protected $view = "cadastro::produtos";
    protected $view_apagados = "cadastro::produtos.apagados";
    protected $route = "produtos";
    protected $logCannel;

    
    public function __construct(Produto $produto){
        $this->model = $produto;
        $this->middleware('auth');
        $this->logCannel = 'cadastro';
        $this->middleware('permissao:produtos')->only([ 'index' , 'show'  ]) ;        
        $this->middleware('permissao:produtos-cadastrar')->only([ 'create' , 'store']);
        $this->middleware('permissao:produtos-editar')->only([ 'edit' , 'update']);
        $this->middleware('permissao:produtos-soft-delete')->only([ 'destroySoft' ]);
        $this->middleware('permissao:produtos-restore')->only([ 'restore' ]);        
        $this->middleware('permissao:produtos-admin-permanete-delete')->only([ 'destroy' ]);
        $this->middleware('permissao:produtos-apagados')->only([ 'indexApagados' , 'showApagado' ]) ;
    }


    
}
