@extends('layout')
@section('title', 'Editar proyecto')

@section('content')
<div class="container">
    <div class="row">
        <div class="col12 col-sm-10 col-lg-6 mx-auto">
            <h1 class="display-4">Crear nuevo</h1>
            <hr>
            @include('partials.validation-errors')
            <form class="bg-white shadow rounded py-4 px-4" method="POST" action="{{route('projects.update',$project)}}">
                @csrf @method('PUT')
                @include('projects._form',['btnText'=>'Actualizar'])
            </form>
        </div>
    </div>
</div>
@endsection