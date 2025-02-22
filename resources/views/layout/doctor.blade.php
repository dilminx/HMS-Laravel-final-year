<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Doctor Panel</h4>
        <a href="#" class="nav-link" data-page="dashboard">🏠 Dashboard</a>
        <a href="#" class="nav-link" data-page="patients">👨‍⚕️ Find Patient</a>
        <a href="#" class="nav-link" data-page="appointments">📅 Appointments</a>
        <a href="#" class="nav-link" data-page="set-dates">📌 Set Available Dates</a>
        <a href="#" class="nav-link" data-page="payments">💳 Payment History</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <div id="content-area">
            <h2>Welcome to Doctor Dashboard</h2>
            <p>Select an option from the sidebar.</p>
        </div>
    </div>

    <!-- jQuery to Load Pages Dynamically -->
    <script>
        $(document).ready(function () {
            $(".nav-link").click(function (e) {
                e.preventDefault();
                var page = $(this).data("page");

                $("#content-area").html("<h3>Loading...</h3>");

                $.get("/doctor/" + page, function (data) {
                    $("#content-area").html(data);
                });
            });
        });
    </script>

</body>
</html>
