@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @include('include.message')
            <div class="card">
                <h4 class="card-header text-center">INSCRIPCIONES REALIZADAS</h4>
                <div class="card-body text-end">
                    {{-- <a title="Crear empleado" href="{{ route ('training.create')}}" class="btn btn-primary btn-md"><i class="bi bi-person-plus-fill"></i>&nbsp;Crear</a> --}}
                    <div class="table-responsive">
                      
                    <table class="table">
                      <thead id="th-center">
                          <tr>
                              <th scope="col">&nbsp;Usuario</th>
                              <th scope="col">&nbsp;Capacitación</th>
                              <th scope="col">&nbsp;Fecha de Reserva</th>
                              <th scope="col">&nbsp;Fecha de Cancelación</th>
                              <th scope="col">Modificar</th>
                          </tr>
                      </thead>
                      <tbody id="tb-center">
                        @if (count($reservations) > 0)
                          @foreach ($reservations as $reservation)
                          <tr>
                              <td>{{ Auth::user()->name }}</td>
                              <td>{{$reservation->training->name }}</td>
                              <td>{{$reservation->reservation_date}}</td>
                              <td>{{$reservation->cancellation_date}}</td>  
                              <td><a href="{{ route('reservation.edit', ['id' => $reservation->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a></td>
                          </tr>
                          @endforeach
                        @else
                            <tr>
                                <td colspan="8">Sin inscripciones...</td>
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