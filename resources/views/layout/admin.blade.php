<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (for dismiss button functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    
    
    <!-- Navbar -->
    <div class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand px-4" href="{{ route('admin.dashboard') }}">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto px-4">
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('admin.profile') }}">Profile</a></li>
                    <li class="nav-item">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Notifications -->
<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar vh-100">
                <div class="sidebar-sticky p-3">
                    <ul class="nav flex-column">
                        <li class="nav-item border border-dark m-1"><a class="nav-link text-dark" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item border border-dark m-1"><a class="nav-link text-dark" href="{{ route('admin.addUser') }}">Add Users</a></li>
                        <li class="nav-item border border-dark m-1"><a class="nav-link text-dark" href="{{ route('admin.users') }}">Manage Users</a></li>
                        <li class="nav-item border border-dark m-1"><a class="nav-link text-dark" href="{{ route('admin.payment') }}">Manage payment</a></li>
                        <li class="nav-item border border-dark m-1"><a class="nav-link text-dark" href="{{ route('admin.report') }}">Manage report</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-3">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Logout Form (Hidden) -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('logout-form').submit();">Yes, Logout</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
