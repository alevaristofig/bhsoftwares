@extends('layout.app')

@section('content')

    <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <a href="{{route('prova.alunos.create')}}" class="left btn_novo"><button class="btn btn-success">Novo</button></a></h3> 
                <input type="hidden" name="url" id="url" value="{{route('prova.aluno.listar')}}" />
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="table-responsive">
                    <table id="aluno_lista" class="table table-bordered table-striped display nowrap">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Email</th>                            
                                <th>Ações</th>
                            </tr>
                        </thead>
                    </table>            
                </div>
            </div>
        </div>

@endsection
