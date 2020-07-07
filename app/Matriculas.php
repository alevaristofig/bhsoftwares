<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriculas extends Model
{    
    protected $primaryKey = 'id';
    
    public $timestamp = false;
    
    protected $fillable = ['aluno_id','curso_id'];        
}
