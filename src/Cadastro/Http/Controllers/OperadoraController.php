<?php

namespace Manzoli2122\Salao\Cadastro\Http\Controllers;

use Manzoli2122\Salao\Cadastro\Models\Operadora;
use Manzoli2122\Salao\Cadastro\Mail\OperadoraMail;
use Manzoli2122\Salao\Cadastro\Http\Controllers\Padroes\SoftDeleteController ;
//use ChannelLog as Log;
//use Mail;

class OperadoraController extends SoftDeleteController
{
  
    protected $model;
    protected $logCannel;
    protected $name = "Operadora";
    protected $view = "cadastro::operadoras";
    protected $view_apagados = "cadastro::operadoras.apagados";
    protected $route = "operadoras";

    //protected $destinatario = 'manzoli2122@gmail.com' ;
    //protected $enviador = 'manzoli.elisandra@gmail.com' ;
    //protected $nome_enviador = 'Salao Espaco Vip' ;




    public function __construct(Operadora $operadora){
        $this->model = $operadora;
        $this->middleware('auth');

        $this->logCannel = 'cadastro';

        $this->middleware('permissao:operadoras')->only([ 'index' , 'show' ]) ;        
        $this->middleware('permissao:operadoras-cadastrar')->only([ 'create' , 'store']);
        $this->middleware('permissao:operadoras-editar')->only([ 'edit' , 'update']);
        $this->middleware('permissao:operadoras-soft-delete')->only([ 'destroySoft' ]);
        $this->middleware('permissao:operadoras-restore')->only([ 'restore' ]);        
        $this->middleware('permissao:operadoras-admin-permanete-delete')->only([ 'destroy' ]);
        $this->middleware('permissao:operadoras-apagados')->only([ 'indexApagados' , 'showApagado']) ;
        
    }   


    // Log::write('cadastro', 'User sent out 3 voucher.')

   // protected function mail($model)
   // {        Mail::to($this->destinatario)->send(new OperadoraMail($model));    }
}
