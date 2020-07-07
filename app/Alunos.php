<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $primaryKey = 'id';
    
    public $timestamp = false;
    
    protected $fillable = ['nome','email','data_nascimento','created_at','updated_at'];
    
    public function alunoCurso()
    {       
        return $this->belongsToMany(Alunos::class,'matriculas','aluno_id');
    }
}
