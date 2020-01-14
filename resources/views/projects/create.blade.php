@extends('layout')
@section('title', 'Crear proyecto')

@section('content')
<div class="container">
    <div class="row">
        <div class="col12 col-sm-10 col-lg-6 mx-auto">
            <h1>Crear nuevo</h1>
            @include('partials.validation-errors')
            <form  class="bg-white shadow rounded py-4 px-4" method="POST" action="{{route('projects.store')}}">
                @csrf
                @include('projects._form',['btnText'=>'Guardar'])
            </form>
        </div>
    </div>
</div>

@endsection