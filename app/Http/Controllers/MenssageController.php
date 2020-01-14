<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MenssageController extends Controller
{
    public function store(Request $request)
    {
        //Acceder al valor del campo
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ]);
        //return $request->get('nombre');
        //Enviar email
        Mail::to('ammiel16@gmail.com')->send(new MessageReceive($request));
        //return new MessageReceive($request);  imprimir rapidamente el mensaje del correo en html solo retornar el Messagereceive
        //return 'mensaje recibido';
        return back()->with('status', 'Recibimos tu mensaje te responderemos en menos de 24 horas'); // redirecciona a la ultima peticion que hicimos, en este caso al mismo formulario
        //con el metodo with guardamos los mensajes en la sesion y lo mostramos con el metodo session()
    }
}
