<!--con el metodo session mostramos los mensajes de la sesion-->
@if(session('status'))
{{session('status')}} 
@endif