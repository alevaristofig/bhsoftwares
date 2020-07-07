<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos;
use App\Http\Requests\CursoFormRequest;
use Yajra\DataTables\Facades\DataTables;

class CursosController extends Controller
{
    private $curso;
    
    public function __construct(Cursos $curso)
    {
        $this->curso = $curso;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoFormRequest $request)
    {
        $data = $request->all();
        
        $this->curso->create($data);
        
        flash()->message('Curso criado com Sucesso!')->success();
        
        return redirect()->route('prova.cursos.index');
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
        $curso = $this->curso::find($id);
        
        if(isset($curso))
        {
            return view('cursos.edit',compact('curso'));
        }
        else
        {
            flash('Os dados do Curso não foram encontrados!')->warning();
            
            return redirect()->route('prova.cursos.index');
        }                     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoFormRequest $request, $id)
    {
        $curso = $this->curso::find($id);
        
        $data = $request->all();
        
        $curso->update($data);
        
        flash()->message('Curso atulizado com Sucesso!')->success();
        
        return redirect()->route('prova.cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = $this->curso::find($id);
        
        $curso->delete();
        
        flash()->message('Curso removido com Sucesso!')->success();
        
         return redirect()->route('prova.cursos.index');
    }
    
     //metodo que busca a lista de alunos no banco de dados
    public function listarCurso(Request $request)
    {
        $query = $request->get('search');
        
        if($query['value'] == null)
         {
            $curso = $this->curso::latest()->get();       
         }
         else
         { 
            $curso = $this->curso::where('titulo','LIKE', '%'.$query['value'].'%')
                                ->orWhere('descricao','LIKE', '%'.$query['value'].'%')
                                ->get();            
         }        
  
        return Datatables::of($curso)
                ->addColumn('acoes',function($curso){
                    $button = '<a name="editar" '
                            . 'href="'.route('prova.cursos.edit',['curso' => $curso->id]).'" class="btn btn-primary btn-sm" style="margin-right:10px;float:left;">Editar</a>';
                    $button.= '<form action="'.route('prova.cursos.destroy',['curso' => $curso->id]).'" method="post" style="float:left;">';
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
