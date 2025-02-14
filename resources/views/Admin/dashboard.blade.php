<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="doctor/dashboard">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lab Assistants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ url('/logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mt-5">
        <h2>Welcome, {{ $admin->first_name }} {{ $admin->last_name }}</h2>
        <p>Email: {{ $admin->email }}</p>
        <p>tp:{{$admin->mobile_number}}</p>
      
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
