@extends('layout/plantilla')

@section('TituloWEB', 'Crear nuevo registro')

@section('contenido')
<div class="card">
    <div class="card-header">
      Agregar nueva persona
    </div>
    <div class="card-body">
      <p class="card-text">
        <form action="{{ route('personas.store') }}" method="POST">
          @csrf
          <label for="">Apellido paterno</label>
          <input type="text" name="paterno" class="form-control" required>
          <label for="">Apellido materno</label>
          <input type="text" name="materno" class="form-control" required>
          <label for="">Nombre</label>
          <input type="text" name="nombre" class="form-control" required>
          <label for="">Fecha de Nacimiento</label>
          <input type="date" name="fecha_nacimiento" class="form-control" required>
          <br>
          <a href="{{ route('personas.index') }}" class="btn btn-info">
              <span class="fas fa-undo-alt"></span> Regresar
          </a>
          <button class="btn btn-primary">
              <span class="fas fa-user-plus"></span> Agregar
          </button>
      </form>      
      </p>
    </div>
  </div>
@endsection