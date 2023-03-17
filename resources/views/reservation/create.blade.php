@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header text-center">INSCRIBIRSE A UNA CAPACITACIÓN</h4>
                {{-- <div class="card-header">
                    Crear nuevo empleado
                </div> --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('reservation.store')}}" >
                        @csrf

                        <div class="row mb-3">
                            <label for="reservation_date" class="col-md-4 col-form-label text-md-end">Fecha de Reserva *</label>

                            <div class="col-md-6">
                                <input id="reservation_date" type="date" class="form-control @error('start_time') is-invalid @enderror" required
                                    name="reservation_date" value="{{ old('reservation_date') }}" autocomplete="reservation_date"
                                    placeholder="Fecha...">

                                @error('reservation_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cancellation_date" class="col-md-4 col-form-label text-md-end">Fecha de Cancelación </label>

                            <div class="col-md-6">
                                <input id="cancellation_date" type="date" class="form-control @error('cancellation_date') is-invalid @enderror"
                                    name="cancellation_date" value="{{ old('cancellation_date') }}" autocomplete="cancellation_date"
                                    placeholder="Fecha...">

                                @error('cancellation_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="training_id" class="col-md-4 col-form-label text-md-end">Capacitación *</label>

                            <div class="col-md-6">
                                <select name="training_id" id="training_id" class="form-select @error('training_id') is-invalid @enderror" required>
                                    <option value="">Seleccione...</option>
                                    @foreach($trainings as $training)
                                    <option {{ old('training_id') == $training->id ? 'selected' : '' }} value="{{ $training->id }}">{{ $training->name }}</option>
                                    @endforeach
                                </select>
                                @error('training_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary button-save">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection