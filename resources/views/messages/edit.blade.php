@extends('layout')
@section('title', 'Editar mensaje')

@section('content')
    <form method="post" action="{{route('messages.update',$message->id)}}">
        @csrf
        {!!method_field('PUT')!!}
        <label for="nombre">Nombre
            <input type="text" name="nombre" value="{{$message->nombre}}">
            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
        </label><br /><br />
        <label for="email">Email
            <input type="text" name="email" value="{{$message->email}}">
            {!!$errors->first('email', '<span class=error>:message</span>')!!}
        </label><br /><br />
        <label for="mensaje">Mensaje
            <textarea name="mensaje">{{$message->mensaje}}</textarea>
            {!!$errors->first('mensaje', '<span class=error>:message</span>')!!}
        </label><br /><br />
        <input type="submit" value="Enviar">
    </form>
@endsection