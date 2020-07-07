@extends('layout.app')

@section('titulo','Matrícula')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">              
        <form action="{{route('prova.matriculas.update',['id' => $matricula->id])}}" method="post" enctype="multipart/form-data">
            @csrf      
            @method("PUT")
            <div class="row">                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="nome">Aluno</label>
                        <select name="aluno" id="aluno" class="form-control">
                            <option value="">Escolha um Aluno!</option>
                            @foreach($alunos AS $aluno)
                                <option value="{{$aluno->id}}" @if ($aluno->id == $matricula->aluno_id)selected="selected" @endif>{{$aluno->nome}}</option>
                            @endforeach
                        </select>
                        @error('aluno')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>            
                        @enderror
                    </div>
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <select name="curso" id="aluno" class="form-control">
                            <option value="">Escolha um Curso!</option>
                            @foreach($cursos AS $curso)
                                <option value="{{$curso->id}}" @if ($curso->id == $matricula->curso_id)  selected="selected"@endif>{{$curso->titulo}}</option>
                            @endforeach
                        </select>
                        @error('curso')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>            
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </form>
        
    </div>
</div>
@endsection




