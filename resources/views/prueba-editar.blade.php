<h1>Editar formulario</h1>

<form action="{{route('prueba.update',$project)}}" method="POST">
    @csrf @method('PATCH')
    <input type="text" name="title" value="{{old('title',$project->title)}}"><br/>   
    <input type="text" name="url" value="{{old('url',$project->url)}}"><br>
    <textarea name="description">{{old('description',$project->description)}}</textarea><br>
    <button>Guardar</button>
</form>