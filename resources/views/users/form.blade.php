{!!csrf_field()!!}
<div class="form-group">
    <label for='name'>Nombre</label>
    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" type="text" id="name" name="name" placeholder="Nombre" value="{{old('name',$user->name)}}"><br />
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
    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" id="email" name="email" placeholder="Email" value="{{old('email',$user->email)}}"><br />
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>
            {{$message}}
        </strong>
    </span>
    @enderror
</div>
@unless ($user->id)
<div class="form-group">
    <label for='password'>Password</label>
    <input class="form-control bg-light shadow-sm @error('password') is-invalid @else border-0 @enderror" type="password" id="password" name="password" placeholder="Password" value="{{old('password',$user->name)}}"><br />
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>
            {{$message}}
        </strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for='password_confirmation'>Password Confirm</label>
    <input class="form-control bg-light shadow-sm @error('password_confirmation') is-invalid @else border-0 @enderror" type="password" id="password_confirmation" name="password_confirmation" placeholder="Password" value="{{old('password_confirmation',$user->name)}}"><br />
    @error('password_confirmation')
    <span class="invalid-feedback" role="alert">
        <strong>
            {{$message}}
        </strong>
    </span>
    @enderror
</div>
@endunless
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
  {!!$errors->first('roles', '<span class=error>:message</span>')!!}
  <hr>