@extends('layouts.master')
@section('title', 'Data Positions')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Positions</h3>
    <a href="{{ route('positions.create') }}" class="btn btn-primary">+ Tambah Position</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($positions as $pos)
        <tr>
            <td>{{ $pos->id }}</td>
            <td>{{ $pos->nama_jabatan }}</td>
            <td>Rp {{ number_format($pos->gaji_pokok, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('positions.edit', $pos->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('positions.destroy', $pos->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
