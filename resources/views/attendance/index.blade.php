@extends('layouts.master')
@section('title', 'Data Kehadiran')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Kehadiran</h3>
    <a href="{{ route('attendance.create') }}" class="btn btn-primary">+ Tambah Data</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Karyawan</th>
            <th>Tanggal</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attendances as $att)
        <tr>
            <td>{{ $att->id }}</td>
            <td>{{ optional($att->employee)->nama_lengkap }}</td>
            <td>{{ $att->tanggal }}</td>
            <td>{{ $att->waktu_masuk }}</td>
            <td>{{ $att->waktu_keluar }}</td>
            <td>{{ $att->status_absensi }}</td>
            <td>
                <a href="{{ route('attendance.edit', $att->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('attendance.destroy', $att->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $attendances->links() }}
@endsection