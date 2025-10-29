@extends('layouts.master')
@section('title', 'Data Departments')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Departments</h3>
    <a href="{{ route('departments.create') }}" class="btn btn-primary">+ Tambah Department</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Department</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $dept)
        <tr>
            <td>{{ $dept->id }}</td>
            <td>{{ $dept->nama_departemen }}</td>
            <td>
                <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
