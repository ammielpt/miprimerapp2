@extends('layout')
@section('content')
    <h1>Editar usuario</h1>
    @if(session()->has('info'))
    <div class="alert alert-success">{{session('info')}}</div>
    @endif
    <form class="bg-white shadow rounded py-4 px-4" method="post" action="{{route('usuarios.update',$user->id)}}">
        <!--$errors->all() muestra todos los errores en forma de array-->
        {!!method_field('PUT')!!}
        {!!csrf_field()!!}            
        <div class="form-group">
            <label for='name'>Nombre</label>
            <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" type="text" id="name" name="name" placeholder="Nombre" value="{{$user->name}}"><br />
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>
                    {{$message}}
                </strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for='email'>Email</label>
            <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" id="email" name="email" placeholder="Email" value="{{$user->email}}"><br />
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>
                    {{$message}}
                </strong>
            </span>
            @enderror
        </div>
        <div class="checkbox">
            @foreach ($roles as $id=>$name)
            <label>
                <input type="checkbox" 
                value="{{$id}}"
                {{$user->roles->pluck('id')->contains($id)?'checked':''}}
                 name="roles[]">{{$name}}
              </label>
            @endforeach      
          </div> 
        <button class="btn btn-primary btn-lg btn-block">Enviar</button>
    </form>
@endsection