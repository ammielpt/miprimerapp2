@extends('layout')
@section('content')
    <h1>Editar usuario</h1>
    @if(session()->has('info'))
    <div class="alert alert-success">{{session('info')}}</div>
    @endif
    <form class="bg-white shadow rounded py-4 px-4" method="post" action="{{route('usuarios.update',$user->id)}}">
        <!--$errors->all() muestra todos los errores en forma de array-->
        {!!method_field('PUT')!!}                 
        @include('users.form')
        <button class="btn btn-primary btn-lg btn-block">Enviar</button>
    </form>
@endsection