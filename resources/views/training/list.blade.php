@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @include('include.message')
            <div class="card">
                <h4 class="card-header text-center">LISTA DE CAPACITACIONES</h4>
                <div class="card-body text-end">
                    <a title="Crear empleado" href="{{ route ('training.create')}}" class="btn btn-primary btn-md"><i class="bi bi-person-plus-fill"></i>&nbsp;Crear</a>
                    <div class="table-responsive">
                      
                    <table class="table">
                      <thead id="th-center">
                          <tr>
                              {{-- <th scope="col">#</th> --}}
                              <th scope="col">&nbsp;Nombre</th>
                              <th scope="col">&nbsp;Descripción</th>
                              <th scope="col">&nbsp;Fecha</th>
                              <th scope="col">&nbsp;Hora de Inicio</th>
                              <th scope="col">&nbsp;Hora de Finalización</th>
                              <th scope="col">&nbsp;Cantidad de Cupos Disponibles</th>
                              <th scope="col">Modificar</th>
                              <th scope="col">Eliminar</th>
                          </tr>
                      </thead>
                      <tbody id="tb-center">
                        @if (count($trainings) > 0)
                          @foreach ($trainings as $training)
                          <tr>
                              <td>{{$training->name}}</td>
                              <td>{{$training->description}}</td>
                              <td>{{$training->date}}</td>
                              <td>{{$training->start_time}}</td>
                              <td>{{$training->end_time}}</td>
                              <td>{{$training->available_slots}}</td>
                              <td><a href="{{ route('training.edit', ['id' => $training->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a></td>
                              <td>
                                 <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$training->id}}" value="{{$training->id}}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$training->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              Si eliminas esta capacitación nunca podrás recupéralo, ¿estás seguro de querer borrarlo?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <a href="{{ route('training.delete', ['id' => $training->id]) }}" class="btn btn-danger">Borrar definitivamente</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </td>
                          </tr>
                          @endforeach
                        @else
                            <tr>
                                <td colspan="8">Sin capacitaciones...</td>
                            </tr>
                        @endif
                      </tbody>
                    </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection