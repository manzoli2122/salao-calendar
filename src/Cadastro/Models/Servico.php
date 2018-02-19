<?php

namespace Manzoli2122\Salao\Cadastro\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use DB;

class Servico extends Model
{
    public function newInstance($attributes = [], $exists = false)
    {
        $model = parent::newInstance($attributes, $exists);    
        $model->setTable($this->getTable());    
        return $model;
    }

    public function getTable()
    {
        return  Config::get('cadastro.servicos_table' , 'servicos') ;
    }

    

    protected $fillable = [
            'nome', 'valor', 'porcentagem_funcionario', 'ativo' , 'categoria' , 'custo_com_produto' ,
            'desconto_maximo' ,  'desconto_promocional' , 'duracao_aproximada' , 'observacoes' , 
    ];
    

    
    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }

    
    public function scopeInativo($query)
    {
        return $query->where('ativo', 0);
    }


    


    public function index($totalPage)
    {
        return $this->ativo()->orderBy('nome', 'asc')->paginate($totalPage);        
    }




    public function rules($id = '')
    {
        return [
            'nome' => 'required|min:2|max:100',
            'porcentagem_funcionario' => "required|min:0|max:100|integer",                       
        ];
    }




    public function getDatatable()
    {
        return $this->ativo()->select(['id', 'nome', DB::raw(  " concat('R$', ROUND  (valor , 2 ) ) as valor" )  ,  
                                    DB::raw(  " concat( duracao_aproximada , 'min' ) as duracao_aproximada" )  , 'observacoes',
                                    DB::raw(  " concat( porcentagem_funcionario , '%' ) as porcentagem_funcionario" ) , 'categoria'  ,
                                    DB::raw(  " concat( desconto_maximo , '%' ) as desconto_maximo" )     ]);        
    }
    
    public function getDatatableApagados()
    {
        return $this->inativo()->select(['id', 'nome', DB::raw(  " concat('R$', ROUND  (valor , 2 ) ) as valor" )  , 
                                    DB::raw(  " concat( duracao_aproximada , 'min' ) as duracao_aproximada" ) , 'observacoes',
                                    DB::raw(  " concat( porcentagem_funcionario , '%' ) as porcentagem_funcionario" ) , 'categoria'  ,
                                    DB::raw(  " concat( desconto_maximo , '%' ) as desconto_maximo" )    ]);        
    }




}
