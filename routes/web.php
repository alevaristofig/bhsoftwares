<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('prova')->name('prova.')->group(function(){
    Route::resource('alunos','AlunosController');
    Route::get('aluno/listar','AlunosController@listarAluno')->name('aluno.listar');
    
    Route::resource('cursos','CursosController');
    Route::get('curso/listar','CursosController@listarCurso')->name('curso.listar');
    
     Route::resource('matriculas','MatriculaController');
     Route::get('matricula/listar','MatriculaController@listarMatricula')->name('matricula.listar');
    
    /*Route::get('aluno/view_matricula','MatriculaController@create')->name('aluno.view_matricula');
    Route::get('aluno/view_matricula_aluno','MatriculaController@index')->name('aluno.view_matricula_aluno');
    
    
    Route::get('aluno/edit/{id}','MatriculaController@edit')->name('matricula.aluno.edit');
    Route::put('aluno/update/{id}','MatriculaController@update')->name('aluno.update');
    Route::delete('aluno/destroy/{id}','MatriculaController@destroy')->name('aluno.destroy');
    
    Route::post('aluno/matricular','MatriculaController@store')->name('aluno.matricular');
    
    */
    
    
});



