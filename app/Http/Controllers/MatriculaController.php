<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alunos;
use App\Cursos;
Use App\Matriculas;
use App\Http\Requests\MatriculaFormRequest;
use Yajra\DataTables\Facades\DataTables;

class MatriculaController extends Controller
{
    private $aluno;   
    private $curso;
    private $matriculas;
    
    public function __construct(Alunos $aluno, Cursos $curso, Matriculas $matricula) 
    {
        $this->aluno = $aluno;
        $this->curso = $curso;
        $this->matriculas = $matricula;
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matricula.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = $this->aluno::all();
        $cursos = $this->curso::all();
        
        return view ('matricula.create',compact('alunos','cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculaFormRequest $request)
    {
        $this->matriculas->aluno_id = $request->input('aluno');
        $this->matriculas->curso_id = $request->input('curso');
               
        $this->matriculas->save();
        
        flash()->message('Aluno matriculado com Sucesso!')->success();
        
        return redirect()->route('prova.matriculas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matricula = $this->matriculas::find($id);
        
        if(isset($matricula))
        {
            $alunos = $this->aluno::all();
            $cursos = $this->curso::all();
        
            return view('matricula.edit',compact('matricula','alunos','cursos'));
        }
        else
        {
            flash('Os dados da Matrícula não foram encontrados!')->warning();
        
            return redirect()->route('prova.matriculas.index');
        }       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatriculaFormRequest $request, $id)
    {            
        $matricula = $this->matriculas::find($id);
        $matricula->aluno_id = $request->input('aluno');
        $matricula->curso_id = $request->input('curso');
        
        $matricula->update();
        
        flash('Matrícula atualizada com Sucesso!')->success();

        return redirect()->route('prova.matriculas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula = $this->matriculas::find($id);
        
        $matricula->delete();
        
        flash('Matrícula removida com Sucesso!')->success();

        return redirect()->route('prova.matriculas.index');
    }
    
    //metodo que busca a lista de matrículas no banco de dados
    public function listarMatricula(Request $request)
    {       
        $query = $request->get('search');
        
        if($query['value'] == null)
        {
            $matriculas = $this->matriculas::select('matriculas.id','alunos.nome','cursos.titulo AS curso')
                                ->join('alunos','alunos.id','=','matriculas.aluno_id')
                                ->join('cursos','cursos.id','=','matriculas.curso_id')                               
                                ->get();
        }
        else
        {
            $matriculas = $this->matriculas::select('matriculas.id','alunos.nome','cursos.titulo AS curso')
                                ->join('alunos','alunos.id','=','matriculas.aluno_id')
                                ->join('cursos','cursos.id','=','matriculas.curso_id')
                                ->where('cursos.titulo','LIKE', '%'.$query['value'].'%')
                                ->orWhere('alunos.nome','LIKE', '%'.$query['value'].'%')
                                ->get();
        }
       

        return Datatables::of($matriculas)
                ->addColumn('acoes',function($matriculas){
                    $button = '<a name="editar" href="'.route('prova.matriculas.edit',['matricula' => $matriculas->id]).'" class="btn btn-primary btn-sm" style="margin-right:10px;float:left;">Editar</a>';
                    $button.= '<form action="'.route('prova.matriculas.destroy',['matricula' => $matriculas->id]).'" method="post" style="float:left;">';
                    $button.= '<input type="hidden" name="_token" value="'.csrf_token().'">';
                    $button.= '<input type="hidden" name="_method" value="DELETE">';
                    $button.= '<button type="submit" class="btn btn-sm btn-danger">APAGAR</button>';
                    $button.= '</form>';
                  
                    return $button;
                })
                ->rawColumns(['acoes'])
                ->make(true);
    }
}
