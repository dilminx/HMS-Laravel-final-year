<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Bootstrap CSS (local) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

</head>
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <nav class="bg-dark text-white p-3 min-vh-100" style="width: 250px;">
            <h4><i class="fas fa-user-md"></i> Doctor Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="/doctor/dashboard" class="nav-link text-white"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="nav-item"><a href="/doctor/appointments" class="nav-link text-white"><i class="fas fa-calendar-alt"></i> Appointments</a></li>
                <li class="nav-item"><a href="/doctor/patients" class="nav-link text-white"><i class="fas fa-users"></i> Patients</a></li>
                <li class="nav-item"><a href="/doctor/lab-requests" class="nav-link text-white"><i class="fas fa-vials"></i> Lab Requests</a></li>
                <li class="nav-item"><a href="/doctor/payments" class="nav-link text-white"><i class="fas fa-file-invoice-dollar"></i> Payments</a></li>
            </ul>
        </nav>
        
        {{-- Main Content --}}
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
    
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/toastr.min.js') }}"></script>
   