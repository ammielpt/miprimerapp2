<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Policies\UserPolicy;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use Illuminate\Support\Facades\App;

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
        $user = new User();
        $roles = Role::pluck('display_name', 'id');
        return view('users.create', compact('roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = (new User)->fill($request->all());
        //return $request->all();
        //$user = User::create($request->all()); user fill metodo para llenar una instancia del user con atributos y ahorrarnos el acceso a la BD mediante create
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('public');
        }
        $user->save();
        //$user->password= bcrypt($request->password);
        //$user->save();
        $user->roles()->attach($request->roles);
        return  redirect()->route('usuarios.index');
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
        //
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('public');
        }
        $user->update($request->only('name', 'email'));
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
