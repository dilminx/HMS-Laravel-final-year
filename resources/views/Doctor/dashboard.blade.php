@extends('layouts.doctor')

@section('content')
<div class="container">
    <h2>Welcome, Dr. {{ auth()->user()->name }}</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Patients</h5>
                    <p class="card-text">{{ $totalPatients }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Appointments</h5>
                    <p class="card-text">{{ $totalAppointments }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Lab Reports</h5>
                    <p class="card-text">{{ $pendingLabTests }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
