@extends('layouts.header')

@section('title', 'Usuarios')

@section('content')

@include('common.error')

@include('common.success')

<div class="container">
        <!-- Login -->
        <br>
        <h1>Login</h1>
        <br>
        <div id="menu-login">
        <p class="text-xl-left">-Crea un usuario</p>
        {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST']) !!}

        {!! Form::label('email', 'Email address:') !!}
        {!! Form::text('Email', null, ['class'=>'form-control login-email ' .($errors->has('Email') ? 'border-danger':''), 'placeholder'=>'Email']) !!}
        <br>

        {!! Form::label('password', 'Password:') !!}
        {!! Form::text('Password', null, ['class'=>'form-control login-password ' .($errors->has('Password') ? 'border-danger':''), 'placeholder'=>'Password']) !!}
        <br>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

        {!! Form::close()!!}
    </div>


<div>
        <!-- Mostrar usuarios insertados -->
        <table class="table container">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Option 1</th>
      <th scope="col">Option 2</th>
      <th scope="col">Option 3</th>
    </tr>
  </thead>
   <tbody>

        @foreach($usuarios as $usuario)

        {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario], 'method' => 'PUT']) !!} 
        
    <tr>
      <td>{!! Form::text('email', $usuario->email, ['class'=>'form-control mostrar-email', 'id' => 'mostrar-email' . $usuario->id, 'disabled' => true, 'placeholder'=>'Email']) !!}</td>
      <td>{!! Form::text('password', $usuario->password, ['class'=>'form-control mostrar-password', 'id' => 'mostrar-password' . $usuario->id, 'disabled' => true, 'placeholder'=>'Password']) !!}</td>
      <td>{!! Form::submit('Guardar', ['class' => 'btn btn-success boton-guardar-login', 'id' => 'boton-guardar-login' . $usuario->id, 'disabled' => true]) !!}</td>
      <td>{!! Form::button('Modificar', ['class' => 'btn btn-warning boton-modificar-login', 'id' => 'boton-modificar-login' . $usuario->id, 'onclick' => 'modificar_usuario(\''.$usuario->id.'\')']) !!}</td>
    {!! Form::close()!!}

    <!-- Eliminar -->
    {!! Form::open([ 'route' => ['usuarios.destroy', $usuario->id], 'method' => 'DELETE']) !!}
    <td>{!! Form::submit('Eliminar', ['class' => 'btn btn-danger boton-eliminar-login', 'id' => 'boton-eliminar-login' . $usuario->id]) !!}</td>
    {!! Form::close()!!}
    </tr>

<!-- Mostrar contenido dependiendo de cada rol de usuario -->
@if(Auth::user()->hasRole('admin'))
    
    @else
        <script>
            var id = <?php echo(json_encode($usuario->id)); ?>;
            document.getElementById("boton-modificar-login" + id).disabled = true;
            document.getElementById("boton-eliminar-login" + id).disabled = true;  
        </script>
    @endif
    
    @endforeach

  </tbody>
</table>

<!-- Paginacion -->
{!! $usuarios->render() !!}

<!-- Mostrar contenido dependiendo de cada rol de usuario -->
@if(Auth::user()->hasRole('admin'))
    
    @else
        <script>
            document.getElementById("menu-login").style.display = "none";
        </script>
    @endif

@endsection

@extends('layouts.footer')

