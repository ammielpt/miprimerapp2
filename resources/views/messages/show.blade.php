@extends('layout')
@section('title','Mensaje|'.$message->nombre)

@section('content')
    <h1>Mensaje</h1>
    <p>Enviador por {{$message->nombre}} - {{$message->email}}</p>
    <p>{{$message->mensaje}}</p>
@endsection