<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Restricted</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="text-danger">Access Restricted</h1>
        <p>Your account is currently inactive. Please contact the administrator for assistance.</p>
        <p><strong>Admin Email:</strong> <a href="mailto:admin@gmail.com">admin@gmail.com</a></p>
        <a href="{{ route('login') }}" class="btn btn-primary">Go to Login</a>
    </div>
</body>
</html>
