<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Message;

class MenssageController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$messages = DB::table('messages')->get();
        $messages = Message::get();
        return view('messages.index', compact('messages'));
    }
    public function store(Request $request)
    {
        //Acceder al valor del campo
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required|min:3'
        ]);
        //$message=DB::table('messages')->insert([
        //    "nombre" => $request->input("nombre"),
        //    "email" => $request->input("email"),
        //    "mensaje" => $request->input("mensaje"),
        //    "created_at" => Carbon::now(),
        //    "updated_at" => Carbon::now()
        //]);s
        $message = Message::create([
            "nombre" => $request->input("nombre"),
            "email" => $request->input("email"),
            "mensaje" => $request->input("mensaje")
        ]);
        //auth()->check()->messages()->create($request->all());
        //$message->user_id=auth()->id();
        //$message->save();
        if (auth()->check()) {
            auth()->user()->messages()->save($message);
        }
        //return $request->get('nombre');
        //Enviar email
        Mail::to('ammiel16@gmail.com')->send(new MessageReceive($request));
        //return new MessageReceive($request);  imprimir rapidamente el mensaje del correo en html solo retornar el Messagereceive
        //return 'mensaje recibido';
        //return back()->with('status', 'Recibimos tu mensaje te responderemos en menos de 24 horas'); // redirecciona a la ultima peticion que hicimos, en este caso al mismo formulario
        //con el metodo with guardamos los mensajes en la sesion y lo mostramos con el metodo session()
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
