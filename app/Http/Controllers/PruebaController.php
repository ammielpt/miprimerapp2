<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::get();
        return view('prueba-portafolio', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('prueba-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request('name');
        //$request->get('name);
        request()->validate([
            "title" => "required",
            "description" => "required",
            "url" => "required",
        ]);
        Project::create([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description')
        ]);
        return redirect()->route('prueba.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $id)
    {
        //$project = Project::findOrFail($id);
        $project = $id;
        return view('prueba-detalle', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $id)
    {
        return view('prueba-editar', [
            'project' => $id
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $id, Request $request)
    {
        //return request('description');
        $id->update([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description')
        ]);
        //return $id;
        return redirect()->route('prueba.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $id)
    {
        $id->delete();
        return redirect()->route('prueba.index');
    }
}
