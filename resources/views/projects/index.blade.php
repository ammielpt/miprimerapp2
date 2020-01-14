@extends('layout')
@section('title', 'Portafolio')

@section('content')
<div class="div container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="display-4 mb-0">Portfolio</h1>
        @auth
        <a class="btn btn-primary" href="{{route('projects.create')}}">Crear proyecto</a>
        @endauth
    </div>
    <p class="lead text-secondary">Proyectos realizados lorem ipsum</p>
    <ul class="list-group">
        @forelse($projects as $project)
        <li class="list-group-item border-0 mb-3 shadow-sm">
            <a class="d-flex justify-content-between align-items-center" href="{{route('projects.show',$project)}}">
                <span class="text-secondary font-weight-bold">{{$project->title}}</span>
                <span class="text-black-50">{{$project->created_at->format('d/m/Y')}}</span>
            </a>
            <br /><small>{{$project->description}}</small><br />{{$project->updated_at->diffForHumans()}}</li>
        @empty
        <li class="list-group-item border-0 mb-3 shadow-sm">No hay portafolios para mostrar</li>
        @endforelse
        {{$projects->links()}}
    </ul>
</div>
@endsection