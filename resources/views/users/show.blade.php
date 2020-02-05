@extends('layout')
@section('content')
    <img src="{{Storage::url($user->avatar)}}" width="100" height="100">
    <h1>{{$user->name}}</h1>
    <table class="table">
        <tr>
            <th>Nombre:</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Roles:</th>
            <td>@foreach ($user->roles as $role)
                {{$role->display_name}}
            @endforeach</td>
        </tr>
    </table>
    @can('edit',$user)
    <a class="btn btn-info" href="{{route('usuarios.edit',$user->id)}}">
        Editar
    </a>
    @endcan    
    @can('destroy', $user)
    <form style="display:inline" method="POST" action="{{route('usuarios.destroy',$user->id)}}">
        {!!csrf_field()!!}
        {!!method_field('DELETE')!!}
        <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
    </form>
    @endcan
@endsection
