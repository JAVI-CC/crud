@extends('layouts.header')

@section('title', 'Entrega')

@section('content')

@include('common.error')

@include('common.success')

  <div class="container">
        <!-- Entrega -->
        <br>
        <h1>Entrega</h1>
        <br>
        <div id="menu-entrega">
        <p class="text-xl-left">-Especifica la entrega</p>
       
    {!! Form::open(['route' => 'entrega.store', 'method' => 'POST']) !!}

<form>
  <div class="form-row">
    <div class="col">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::number('Telefono', null, ['class'=>'form-control ' .($errors->has('Telefono') ? 'border-danger':''), 'placeholder'=>'Telefono']) !!}
    </div>
    <div class="col">
    {!! Form::label('fecha_inicio', 'Fecha inicial:') !!}
    <input class="form-control {{ $errors->has('Fecha_inicio') ? 'border-danger' : '' }}" type="date" name="Fecha_inicio" value="{{old('Fecha_inicio')}}">
    </div>
    <div class="col">
    {!! Form::label('fecha_final', 'Fecha final:') !!}
    <input class="form-control {{ $errors->has('Fecha_final') ? 'border-danger' : '' }}" type="date" name="Fecha_final" value="{{old('Fecha_final')}}">
    </div>
    <div class="col-auto">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary boton-entregas']) !!}
    </div>

    {!! Form::close()!!}

  </div>
  
</form>
<br>
<br>
</div>

 <!-- Mostrar entregas insertados -->
 <table class="table container">
  <thead>
    <tr>
      <th scope="col">Telefono</th>
      <th scope="col">Fecha inicial</th>
      <th scope="col">Fecha final</th>
      <th scope="col">Option 1</th>
      <th scope="col">Option 2</th>
      <th scope="col">Option 3</th>
    </tr>
  </thead>
   <tbody>

        @foreach($entregas as $entrega)

        {!! Form::model($entrega, ['route' => ['entrega.update', $entrega], 'method' => 'PUT']) !!} 
        
    <tr>
      <td>{!! Form::number('telefono', $entrega->telefono, ['class'=>'form-control mostrar-telefono', 'id' => 'mostrar-telefono' . $entrega->id, 'disabled' => true]) !!}</td>
      <td><input class="form-control mostrar-fecha-inicio input {{ $errors->has('fecha_inicio') ? 'is-danger' : '' }}" type="date" name="fecha_inicio" id="mostrar-fecha-inicio<?php echo htmlspecialchars($entrega->id); ?>" value="<?php echo htmlspecialchars($entrega->fecha_inicio); ?>" disabled></td>
      <td><input class="form-control mostrar-fecha-final input {{ $errors->has('fecha_final') ? 'is-danger' : '' }}" type="date" name="fecha_final" id="mostrar-fecha-final<?php echo htmlspecialchars($entrega->id); ?>" value="<?php echo htmlspecialchars($entrega->fecha_final); ?>" disabled></td>
      <td>{!! Form::submit('Guardar', ['class' => 'btn btn-success boton-guardar-entrega', 'id' => 'boton-guardar-entrega' . $entrega->id, 'disabled' => true]) !!}</td>
      <td>{!! Form::button('Modificar', ['class' => 'btn btn-warning boton-modificar-entrega', 'id' => 'boton-modificar-entrega' . $entrega->id, 'onclick' => 'modificar_entrega(\''.$entrega->id.'\')']) !!}</td>
    {!! Form::close()!!}

    <!-- Eliminar -->
    {!! Form::open([ 'route' => ['entrega.destroy', $entrega->id], 'method' => 'DELETE']) !!}
    <td>{!! Form::submit('Eliminar', ['class' => 'btn btn-danger boton-eliminar-entrega', 'id' => 'boton-eliminar-entrega' . $entrega->id]) !!}</td>
    {!! Form::close()!!}
    </tr>

<!-- Mostrar contenido dependiendo de cada rol de usuario -->
@if(Auth::user()->hasRole('admin'))
    
    @else
        <script>
            var id = <?php echo(json_encode($entrega->id)); ?>;
            document.getElementById("boton-modificar-entrega" + id).disabled = true;
            document.getElementById("boton-eliminar-entrega" + id).disabled = true;  
        </script>
    @endif
    
    @endforeach

  </tbody>
</table>

<!-- Paginacion -->
{!! $entregas->render() !!}

<!-- Mostrar contenido dependiendo de cada rol de usuario -->
@if(Auth::user()->hasRole('admin'))
    
    @else
        <script>
            document.getElementById("menu-entrega").style.display = "none";
        </script>
    @endif

@endsection

@extends('layouts.footer')