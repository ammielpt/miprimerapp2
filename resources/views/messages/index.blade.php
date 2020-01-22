@extends('layout')
@section('title', 'Mensajes')
@section('content')
    <h1>Todos los mensajes</h1>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Mensaje</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr>
                <td>{{$message->id}}</td>
                <td><a href="{{route('messages.show',$message->id)}}">{{$message->nombre}}</a></td>
                <td>{{$message->email}}</td>
                <td>{{$message->mensaje}}</td>
                <td><a href="{{route('messages.edit', $message->id)}}">Editar</a>
                    <form style="display: inline;" action="{{route('messages.destroy', $message->id)}}" method="POST">
                        {!!method_field('DELETE')!!}
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection