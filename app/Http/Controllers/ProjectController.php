<?php

namespace App\Http\Controllers;

use App\Project;  //uso de la vista
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Http\Requests\saveProjectRequesst;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function __construct()
    {
      // EJERCICIO $this->middleware('edad')->only('destroy'); //solo los mayores de edad pueden Eliminar

 //Primero autorizados? definir accesos libre-invitados
      $this->middleware('auth')->except('index','show'); // invitados solo pueden ver
//luego. definir los permisos
      $this->middleware('can:projects.create')->only('create','store');
      $this->middleware('can:projects.edit')->only('edit','update');
      $this->middleware('can:projects.desroy')->only('desroy');

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $projects = Project::orderBy('created_at','DESC')->paginate(10);

    return view('projects.index',compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return view\Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create',['project' => new Project]);  // se pasa un  proyecto vacio solo para normalizar form con edit
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveProjectRequesst $request)
    {

        Project:: create( $request->validated() );

     return redirect()->route('projects.index')->with('MensajeStatus', 'Proyeto Almacenado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      //  if (Gate::denies('solo-admin-show-project-3', $id)) {  return redirect()->route('projects.index')->with('MensajeStatus', 'Solo admin pueden ver el 3re proyecto');}

       $project = Project::findOrfail($id);
       return view('projects.show',['project' => $project]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    /*  if (Gate::denies('isAdmin', $id)) { // ej. no se prohibio en la view
            return redirect()->route('projects.index')->with('MensajeStatus', 'Solo admin pueden editar');
     } */


        $project = Project::findOrfail($id);
        return view('projects.edit',['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, saveProjectRequesst $request)
    {

        $project->update(  $request->validated() );
        return redirect()->route('projects.show',['project' => $project])->with('MensajeStatus', 'Proyeto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
      // Project::destroy::($id)    //por id
      $project->delete();

      return redirect()->route('projects.index')->with('MensajeStatus', 'Proyeto Eliminado');
    }
}
