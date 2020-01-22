<link rel='stylesheet' type='text/css' href="/css/app.css" >
<script src="/js/app.js" type=""></script>
<h1>{{__('Contact')}}</h1>
<h2>Escribeme</h2>
<style>
    .error{
        color:red;
    }
</style>
<form method="post" action="{{route('messages.store')}}">
    @csrf
    <label for="nombre">Nombre
        <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}"> 
        {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
    </label><br/><br/>
    <label for="email">Email
        <input type="text" class="form-control" name="email">
        {!!$errors->first('email', '<span class=error>:message</span>')!!}
    </label><br/><br/>
    <label for="mensaje">Mensaje
        <textarea name="mensaje" class="form-control"></textarea>
        {!!$errors->first('mensaje', '<span class=error>:message</span>')!!}
    </label><br/><br/>
    <input type="submit" class="btn btn-primary" value="Enviar">
</form>

<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</form>