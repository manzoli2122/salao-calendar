<?php

namespace Manzoli2122\Salao\Cadastro\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use DB;
class Produto extends Model
{
    public function newInstance($attributes = [], $exists = false)
    {
        $model = parent::newInstance($attributes, $exists);    
        $model->setTable($this->getTable());    
        return $model;
    }

    public function getTable()
    {
        return  Config::get('cadastro.produtos_table' , 'produtos');
    }

     
    protected $fillable = [
            'nome', 'valor', 'descricao', 'ativo' , 'observacoes' , 'desconto_maximo' , 'desconto_promocional' , 
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
                                
        ];
    }










    
    public function getDatatable()
    {
        return $this->ativo()->select(['id', 'nome',  DB::raw(  " concat('R$', ROUND  (valor , 2 ) ) as valor" )  ,
        'observacoes' , DB::raw(  " concat( desconto_maximo , '%' ) as desconto_maximo" )  ]);        
    }
    
    public function getDatatableApagados()
    {
        return $this->inativo()->select(['id', 'nome',  DB::raw(  " concat('R$', ROUND  (valor , 2 ) ) as valor" )  ,
        'observacoes' , DB::raw(  " concat( desconto_maximo , '%' ) as desconto_maximo" )   ]);        
    }

}
