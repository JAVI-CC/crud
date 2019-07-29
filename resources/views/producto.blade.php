@extends('layouts.header')

@section('title', 'Productos')

@section('content')

@include('common.error')

@include('common.success')

  <div class="container">
        <!-- Productos -->
        <br>
        <h1>Productos</h1>
        <br>
        <div id="menu-producto">
        <p class="text-xl-left">-Introduzca un producto</p>
       
    {!! Form::open(['route' => 'producto.store', 'method' => 'POST']) !!}

<form>
  <div class="form-row">
    <div class="col">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class'=>'form-control ' .($errors->has('Nombre') ? 'border-danger':''), 'placeholder'=>'Nombre']) !!}
    </div>
    <div class="col">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::text('Precio', null, ['class'=>'form-control ' .($errors->has('Precio') ? 'border-danger':''), 'placeholder'=>'Precio']) !!}
    </div>
    <div class="col">
    {!! Form::label('unidades', 'Unidades:') !!}
    {!! Form::number('Unidades', null, ['class'=>'form-control ' .($errors->has('Unidades') ? 'border-danger':''), 'placeholder'=>'Unidades']) !!}
    </div>
    <div class="col-auto">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary boton-producto']) !!}
    </div>

    {!! Form::close()!!}

  </div>
  
</form>
<br>
<br>
</div>
    <!-- Mostrar productos insertados -->
    <table class="table container">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Unidades</th>
      <th scope="col">Option 1</th>
      <th scope="col">Option 2</th>
      <th scope="col">Option 3</th>
    </tr>
  </thead>
   <tbody>

        @foreach($productos as $producto)

        {!! Form::model($producto, ['route' => ['producto.update', $producto], 'method' => 'PUT']) !!} 
        
    <tr>
      <td>{!! Form::text('nombre', $producto->nombre, ['class'=>'form-control mostrar-nombre', 'id' => 'mostrar-nombre' . $producto->id, 'disabled' => true, 'placeholder'=>'Nombre']) !!}</td>
      <td>{!! Form::text('precio', $producto->precio, ['class'=>'form-control mostrar-precio', 'id' => 'mostrar-precio' . $producto->id, 'disabled' => true, 'placeholder'=>'Precio']) !!}</td>
      <td>{!! Form::number('unidades', $producto->unidades, ['class'=>'form-control mostrar-unidades', 'id' => 'mostrar-unidades' . $producto->id, 'disabled' => true, 'placeholder'=>'Unidades']) !!}</td>
      <td>{!! Form::submit('Guardar', ['class' => 'btn btn-success boton-guardar-producto', 'id' => 'boton-guardar-producto' . $producto->id, 'disabled' => true]) !!}</td>
      <td>{!! Form::button('Modificar', ['class' => 'btn btn-warning boton-modificar-producto', 'id' => 'boton-modificar-producto' . $producto->id, 'onclick' => 'modificar_producto(\''.$producto->id.'\')']) !!}</td>
    {!! Form::close()!!}

    <!-- Eliminar -->
    {!! Form::open([ 'route' => ['producto.destroy', $producto->id], 'method' => 'DELETE']) !!}
    <td>{!! Form::submit('Eliminar', ['class' => 'btn btn-danger boton-eliminar-producto', 'id' => 'boton-eliminar-producto' . $producto->id]) !!}</td>
    {!! Form::close()!!}
    </tr>

<!-- Mostrar contenido dependiendo de cada rol de usuario -->
@if(Auth::user()->hasRole('admin'))
    
    @else
        <script>
            var id = <?php echo(json_encode($producto->id)); ?>;
            document.getElementById("boton-modificar-producto" + id).disabled = true;
            document.getElementById("boton-eliminar-producto" + id).disabled = true;  
        </script>
    @endif
    
    @endforeach

  </tbody>
</table>

<!-- Paginacion -->
{!! $productos->render() !!}

<!-- Mostrar contenido dependiendo de cada rol de usuario -->
@if(Auth::user()->hasRole('admin'))
    
    @else
        <script>
            document.getElementById("menu-producto").style.display = "none";
        </script>
    @endif

    @endsection

    @extends('layouts.footer')