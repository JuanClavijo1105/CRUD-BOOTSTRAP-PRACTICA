@extends('layout/plantilla')

@section('TituloWEB', 'Crear nuevo registro')

@section('contenido')
<div class="card">
    <div class="card-header">
      Actualizar una persona
    </div>
    <div class="card-body">
      <p class="card-text">
        <form action="{{ route('personas.update', $personas->id) }}" method="POST">
          @csrf
          @method('PUT')
            <label for="">Apellido paterno</label>
            <input type="text" name="paterno" class="form-control" required value="{{ $personas->paterno }}">
            <label for="">Apellido materno</label>
            <input type="text" name="materno" class="form-control" required value="{{ $personas->materno }}">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control" required value="{{ $personas->nombre }}">
            <label for="">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required value="{{ $personas->fecha_nacimiento }}">
            <br>
            <a href="{{ route("personas.index") }}" class="btn btn-info">
              <span class="fas fa-undo-alt"></span> Regresar</a>
            <button class="btn btn-warning">
              <span class="fas fa-user-edit"></span> Actualizar</button>
            
        </form>
      </p>
    </div>
  </div>
@endsection