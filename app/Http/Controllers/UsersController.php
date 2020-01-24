<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Policies\UserPolicy;
use App\Http\Requests\UpdateUserRequest;
use App\Role;

class UsersController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except(['show']);
        $this->middleware('roles:admin')->except(['edit', 'update', 'show']); //con dos puntos pasamos los parametros al middleware
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //       
        $user = User::findOrFail($id);
        $this->authorize('edit', $user);
        //$roles= Role::all();
        $roles = Role::pluck('display_name', 'id');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //return $request->all();
        //
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        $user->update($request->all());
        //$user->roles()->attach($request->roles); duplica valores mejor es usar metodo sync
        $user->roles()->sync($request->roles);
        return back()->with('info', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $this->authorize('destroy', $user);
        $user->delete();
        return back();
    }
}
