<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App Pegawai')</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #fafafa; }
        header, footer { background: #efefef; padding: 10px; }
        nav a { margin-right: 10px; text-decoration: none; color: #333; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 5px; }
    </style>
</head>
<body>
<header>
    <h1>Aplikasi Pegawai</h1>
    <nav>
        <a href="{{ url('/employees') }}">Pegawai</a>
        <a href="{{ url('/departments') }}">Departemen</a>
        <a href="{{ url('/positions') }}">Jabatan</a>
        <a href="{{ url('/attendance') }}">Absensi</a>
        <a href="{{ url('/salaries') }}">Gaji</a>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
    <p>&copy; {{ date('Y') }} App Pegawai</p>
</footer>
</body>
</html>
