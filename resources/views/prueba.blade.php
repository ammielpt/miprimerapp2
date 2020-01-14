@extends('layout')

@section('title', 'Prueba')

@section('content')
<h1>Prueba</h1>
Bienvenido {{$nombre??'Invitado'}}
@if($errors->any())
 @foreach ($errors->all() as $error)
    <p>{{$error}}</p> 
 @endforeach
@endif
<form method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nombre..." value="{{old('name')}}"><br/>
    {!!$errors->first('name', '<small>:message</small>')!!}<br/>
    <input name="email" placeholder="Email..." value="{{old('email')}}"><br>
    {!!$errors->first('email', '<small>:message</small>')!!}<br/>
    <input name="subject" placeholder="Asunto..." value="{{old('subject')}}"><br>
    <textarea name="content" placeholder="Mensaje...">{{old('content')}}</textarea><br>
    <button>Enviar</button>
</form>
@endsection