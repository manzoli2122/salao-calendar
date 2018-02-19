<?php

namespace  Manzoli2122\Salao\Cadastro\Http\Controllers;

use Manzoli2122\Salao\Cadastro\Http\Controllers\Padroes\Controller ;

class CadastroController extends Controller
{
	
    public function __construct(  ){
        $this->middleware('auth');
    }  
       
    public function index()
    {
        return view("cadastro::index");
    }
        
}
