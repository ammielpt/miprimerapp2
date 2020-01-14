{{$project->description}}
<a href="{{route('prueba.edit',$project)}}">Editar</a>
<form method="POST" action="{{route('prueba.destroy',$project)}}">
    @csrf @method('DELETE')
    <button>Eliminar</button>
</form>