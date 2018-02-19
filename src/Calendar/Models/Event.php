<?php

namespace Manzoli2122\Salao\Cadastro\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use DB;


class Event extends Model
{
    use SoftDeletes;

    public function newInstance($attributes = [], $exists = false)
    {
        $model = parent::newInstance($attributes, $exists);    
        $model->setTable($this->getTable());    
        return $model;
    }

    public function getTable()
    {
        return  'event';
    }


    
    protected $fillable = [
        'title', 'isAllDay', 'start' , 'end', 'options' ,
    ];
    
    

    


    
    
    public function getId()
    {
        return $this->id;
    }
   
    
    public function getTitle()
    {
        return $this->title;
    }
   
    
    public function isAllDay()
    {
        return $this->isAllDay;
    }
   
    
    public function getStart()
    {
        return $this->start;
    }
   
    
    
    public function getEnd()
    {
        return $this->end;
    }
    


    public function getEventOptions()
    {
        return $this->options;
    }
    
}
