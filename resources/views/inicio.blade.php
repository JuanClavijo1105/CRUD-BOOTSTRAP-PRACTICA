@extends('layout/plantilla')

@section('TituloWEB', 'CRUD con Laravel')
    
@section('contenido')
<div class="card">
    <div class="card-header">
      CRDU Laravel 8 y SQL
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
          @if ($message = Session::get('success'))
              <div class="alert alert-success" role="alert">
              {{$message}}
              </div>
          @endif    
        </div>
      </div>
      <h5 class="card-title">Listado de Personas</h5>
      <p>
        <a href="{{ route("personas.create") }}" class="btn btn-primary">
          <span class="fas fa-user-plus"></span> Agregar nueva persona
        </a>
      </p>
      <hr>
      <p class="card-text">
        <div class="table table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                @foreach ($datos as $item)
                    <tr>
                        <td>{{$item->paterno}}</td>
                        <td>{{$item->materno}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->fecha_nacimiento}}</td>
                        <td>
                          <form action="{{ route("personas.edit", $item->id) }}" method="GET">
                            <button class="btn btn-warning btn-sm">
                              <span class="fas fa-user-edit"></span>
                            </button>
                          </form>
                        </td>
                        <td>
                          <form action="{{ route("personas.show", $item->id) }}" method="GET">
                            <button class="btn btn-danger btn-sm">
                              <span class="fas fa-user-times"></span>
                            </button>
                          </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  {{$datos->links()}}
            </div>
        </div>
      </p>
    </div>
  </div>
  
@endsection