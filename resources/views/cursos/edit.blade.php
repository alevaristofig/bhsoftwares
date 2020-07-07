@extends('layout.app')

@section('titulo','Cursos')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">          
        <form action="{{route('prova.cursos.update',['id' => $curso->id])}}" method="post" enctype="multipart/form-data">
            @csrf   
            @method("PUT")
            <div class="row">                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{$curso->titulo}}" placeholder="Título...">
                        @error('titulo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>            
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="email">Descrição</label>
                        <input type="text" name="descricao" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$curso->descricao}}" placeholder="Descrição...">
                        @error('descricao')
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



