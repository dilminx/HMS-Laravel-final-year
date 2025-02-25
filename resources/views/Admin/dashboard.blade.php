@extends('layout.admin')

@section('content')
    <div class="container mt-4">
        <h2>Welcome, {{ Auth::user()->first_name }}!</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <a  href="{{ route('admin.doctors') }}" class="card-header">Doctors</a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalDoctors }}</h5>
                        <p class="card-text">Total registered doctors.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Patients</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalPatients }}</h5>
                        <p class="card-text">Total registered patients.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Lab Assistants</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalLabAssistants }}</h5>
                        <p class="card-text">Total registered lab assistants.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Total user</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalUsers }}</h5>
                        <p class="card-text">Total users with admin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
