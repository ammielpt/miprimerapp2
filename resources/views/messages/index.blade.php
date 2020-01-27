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
            <th>Notas</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr>               
                <td>{{$message->id}}</td>
                @if($message->user_id)                
                  <td>
                    <a href="{{route('usuarios.show',$message->user_id)}}">
                        {{$message->user->name??''}}
                    </a>
                  </td>
                  <td>{{$message->user->email??''}}</td>
                 @else
                  <td>{{$message->nombre}}</td>
                  <td>{{$message->email}}</td>
                 @endif
                <td><a href="{{route('messages.show',$message->id)}}">{{$message->mensaje}}</a></td>
                <td>{{$message->note->body?? ''}}</td>                
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