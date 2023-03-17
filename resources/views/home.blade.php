@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('include.message')
            @if (isset($trainings) && count($trainings) > 0)
                    @include('training.list', ['trainings' => $trainings])
            @elseif(isset($trainings) && count($trainings) == 0)
                @include('training.list')
            @else
                @include('reservation.list', ['reservations' => $reservations])
            @endif

            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
