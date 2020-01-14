<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    function __construct()
    {
        //$this->middleware('auth')->only('create');
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$portfolio = DB::table('projects')->get(); con querybuilder
        $projects = Project::latest()->paginate(2); //con ORM
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create', [
            'project' => new Project() //enviamos un proyecto vacio.
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
        // return $request->get('title');
        //return request();
        /* Project::create([
            'title'=>request('title'),
            'url'=>request('url'),
            'description'=>request('description')
        ]);*/
        // otro metodo de guardar con el $guarded=[] en el modelo Project nos protegemos de la asigancion masiva gracias al metodo only
        //Project::create(request()->only('title','url','description'));
        //otra forma de cuidarnos de la asignacion masiva es hacer la validacion, devuelve solo los campos validados el metodo validate.

        //la validacion se hace automaticamente con el CreateProjectRequest ya no es necesario incluir estas lineas
        /*$fields = request()->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required'
        ]);
        Project::create($fields);
        */

        //CreateProjectRequest hace la validacion pero no evita la asignacion masiva por lo que debemo usar el metodo validated.
        Project::create($request->validated());
        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //$project = Project::findOrFail($id);
        // aplicando Model binding, por medio del Project        
        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, SaveProjectRequest $request)
    {
        $project->update($request->validated());
        /* $project->update([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description')
        ]);*/
        return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //primera forma para eliminar con eloquent
        //Project::destroy($id);
        // usamos el proyecto para que se elimine a si mismo
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con exito');
    }
}
