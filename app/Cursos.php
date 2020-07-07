<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{    
    protected $primaryKey = 'id';
    
    public $timestamp = false;
    
    protected $fillable = ['titulo','descricao','created_at','updated_at'];
    
    public function alunoCurso()
    {       
        return $this->belongsToMany(Curso::class,'matriculas','curso_id');
    }
}
