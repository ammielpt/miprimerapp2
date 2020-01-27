@extends('layout')
@section('content')
    <h1>Crear Nuevo usuario</h1>
    <form class="bg-white shadow rounded py-4 px-4" method="post" action="{{route('usuarios.store')}}">
        <!--$errors->all() muestra todos los errores en forma de array-->               
        @include('users.form')
        <button class="btn btn-primary btn-lg btn-block">Guardar</button>
    </form>
@endsection