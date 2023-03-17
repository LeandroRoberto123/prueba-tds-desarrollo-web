@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header text-center">EDITAR EMPLEADO</h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('training.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $training->id}}">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $training->name }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Descripción *</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror" required
                                    placeholder="Descripción de la experiencia del empleado"> {{ $training->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Fecha *</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" required
                                    name="date" value="{{ $training->date }}" autocomplete="date"
                                    placeholder="Fecha...">

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_time" class="col-md-4 col-form-label text-md-end">Hora de Inicio *</label>

                            <div class="col-md-6">
                                <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" required
                                    name="start_time" value="{{ $training->start_time }}" autocomplete="start_time"
                                    placeholder="Fecha...">

                                @error('start_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="end_time" class="col-md-4 col-form-label text-md-end">Hora de Finalización *</label>

                            <div class="col-md-6">
                                <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" required
                                    name="end_time" value="{{ $training->end_time }}" autocomplete="end_time"
                                    placeholder="Fecha...">

                                @error('end_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="available_slots" class="col-md-4 col-form-label text-md-end">Cupos Disponibles *</label>

                            <div class="col-md-6">
                                <input id="available_slots" type="number" class="form-control @error('available_slots') is-invalid @enderror" required
                                    name="available_slots" value="{{ $training->available_slots }}" autocomplete="available_slots"
                                    placeholder="Cupos disponibles...">

                                @error('available_slots')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary button-edit">
                                    Actualizar
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