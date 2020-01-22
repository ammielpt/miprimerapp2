<?php

namespace App\Http\Controllers;

use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{


    function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Trabajando con QueryBuilder
        //$messages=DB::table('messages')->get();

        //Trabajando con eloquent
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->input('nombre');
        //return $request->all();
        // DB con QueryBuilder        
        //DB::table('messages')->insert([
        //    "nombre" => $request->input("nombre"),
        //    "email" => $request->input("email"),
        //    "phone" => "123456",
        //    "mensaje" => $request->input("mensaje"),
        //    "created_at" => Carbon::now(),
        //    "updated_at" => Carbon::now()
        //]);

        //Con Eloquent primera forma
        //$message = new Message();
        //$message->nombre = $request->input('nombre');
        //$message->email = $request->input('email');
        //$message->mensaje = $request->input('mensaje');
        //$message->save();

        //Con Eloquent segunda forma, ver fillable en el model Message
        Message::create($request->all());

        //retornando a la vista donde se muestran todos los mensajes
        return redirect()->route('messages.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Con QueryBuilder
        //$message = DB::table('messages')->where('id', $id)->first();

        //Con Eloquent metodo find
        $message = Message::find($id);

        //Con Eloquent metodo find or fail sirve para enviar a la pagina 404 error en caso falle
        $message = Message::findOrFail($id);
        return view('messages.show', compact("message"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Con QueryBuilder
        //$message = DB::table('messages')->where('id', $id)->first();

        //Con Eloquent metodo find or fail sirve para enviar a la pagina 404 error en caso falle
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Actualizamos Con QueryBuilder
        //DB::table('messages')->where('id', $id)->update([
        //    "nombre" => $request->input("nombre"),
        //    "email" => $request->input("email"),
        //    "phone" => "123456",
        //    "mensaje" => $request->input("mensaje"),
        //    "updated_at" => Carbon::now()
        //]);

        //primero encontramos el registro, luego actualizamos
        $message = Message::findOrFail($id);
        $message->update($request->all());
        //Redireccionamos
        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar mensaje con QueryBuilder
        //DB::table('messages')->where('id', $id)->delete();

        //con eloquent primero buscamos el mensaje, luego eliminamos.
        Message::findOrFail($id)->delete();
        //Redireccionar
        return redirect()->route('messages.index');
    }
}
