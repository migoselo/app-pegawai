<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Pegawai')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">App Pegawai</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
                <a class="nav-link" href="{{ route('departments.index') }}">Departments</a>
                <a class="nav-link" href="{{ route('positions.index') }}">Positions</a>
                <a class="nav-link" href="{{ route('attendance.index') }}">Attendance</a>
                <a class="nav-link" href="{{ url('/report') }}">Report</a>
                <a class="nav-link" href="{{ url('/settings') }}">Settings</a>
                <a class="nav-link" href="{{ route('salaries.index') }}">Salaries</a>
            </div>
        </div>
    </div>
</nav>


    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

