@extends('layout')

@section('title', 'Contacto')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded py-4 px-4" method="post" action="{{route('messages.store')}}">
                <!--$errors->all() muestra todos los errores en forma de array-->
                <h1 class="display-4">Contacto</h1>
                @csrf
                <!--@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif-->                
                <div class="form-group">
                    <label for='name'>Nombre</label>
                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" type="text" id="name" name="name" placeholder="Nombre" value="{{old('name')}}"><br />
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
                    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}"><br />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{$message}}
                        </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='subject'>Asunto</label>
                    <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror" id="subject" name="subject" placeholder="Asunto" value="{{old('subject')}}"><br />
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{$message}}
                        </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for='content'>Asunto</label>
                    <textarea class="form-control bg-light shadow-sm @error('content') is-invalid @else border-0 @enderror" name="content" placeholder="Mensaje">{{old('content')}}</textarea><br />
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{$message}}
                        </strong>
                    </span>
                    @enderror
                </div>
                <button class="btn btn-primary btn-lg btn-block">Enviar</button>
            </form>
        </div>
    </div>
</div>
@endsection