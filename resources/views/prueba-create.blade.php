<h1>Crear formulario</h1>

<form action="{{route('prueba.store')}}" method="POST">
    @csrf
    <input type="text" name="title"><br/>   
    <input type="text" name="url"><br>
    <textarea name="description"></textarea><br>
    <button>Guardar</button>
</form>