<h1>Lista de portafolios</h1>
@forelse($projects as $project)
<li><a href="{{route('prueba.show',$project)}}">{{$project->title}}</a></li>
@empty
    <li class="list-group-item border-0 mb-3 shadow-sm">No hay portafolios para mostrar</li>
@endforelse