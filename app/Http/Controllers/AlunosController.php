<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlunoFormRequest;
use App\Alunos;
use Yajra\DataTables\Facades\DataTables;

class AlunosController extends Controller
{
    private $aluno;   
    
    public function __construct(Alunos $aluno) 
    {
        $this->aluno = $aluno;        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alunos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoFormRequest $request)
    {
        $data = $request->all();
        
        $this->aluno->create($data);
        
        flash()->message('Aluno criado com Sucesso!')->success();                
        
        return redirect()->route('prova.alunos.index');
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
        $aluno = $this->aluno::find($id);
        
        if(isset($aluno))
        {
            return view('alunos.edit',compact('aluno'));
        }
        else
        {
            flash('Os dados do Aluno não foram encontrados!')->warning();
        
            return redirect()->route('prova.alunos.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoFormRequest $request, $id)
    {
        $aluno = $this->aluno::find($id);
        $data = $request->all();
        
        $aluno->update($data);
        
        flash('Aluno atuliazado com Sucesso!')->success();
        
        return redirect()->route('prova.alunos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = $this->aluno::find($id);
        
        $aluno->delete();
        
        flash('Aluno removido com Sucesso!')->success();

        return redirect()->route('prova.alunos.index');
    }
    
     //metodo que busca a lista de alunos no banco de dados
    public function listarAluno(Request $request)
    {
        $query = $request->get('search');
        
         if($query['value'] == null)
         {
              $aluno = $this->aluno::latest()->get();       
         }
         else
         { 
            $aluno = $this->aluno::where('nome','LIKE', '%'.$query['value'].'%')
                                 ->orWhere('email','LIKE', '%'.$query['value'].'%')
                                 ->get();            
         }        
  
        return Datatables::of($aluno)
                ->addColumn('acoes',function($aluno){
                    $button = '<a name="editar" '
                            . 'href="'.route('prova.alunos.edit',['aluno' => $aluno->id]).'" class="btn btn-primary btn-sm" style="margin-right:10px;float:left;">Editar</a>';
                    $button.= '<form action="'.route('prova.alunos.destroy',['aluno' => $aluno->id]).'" method="post" style="float:left;">';
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
