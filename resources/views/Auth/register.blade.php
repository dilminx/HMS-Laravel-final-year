<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body class="container mt-5">
    <h2 class="text-center">Register as Patient</h2>

    <form action="{{ url('/register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" name="mobile_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Register</button>
    </form>
</body>
</html>
