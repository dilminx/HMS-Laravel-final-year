<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/3.1.3/bootstrap-notify.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.profile') }}">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky p-3">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.doctors') }}">Manage Doctors</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.labAssistants') }}">Manage Lab Assistants</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.patients') }}">Manage Patients</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}">Manage Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.addUser') }}">Add Users</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Notifications -->
    <script>
        @if(session('success'))
            $.notify("{{ session('success') }}", { type: "success", delay: 3000 });
        @endif

        @if(session('error'))
            $.notify("{{ session('error') }}", { type: "danger", delay: 3000 });
        @endif
    </script>

</body>
</html>
