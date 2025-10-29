@extends('layouts.master')
@section('title', 'Data Gaji')

@section('content')
    <h3>Data Gaji</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Karyawan</th>
            <th>Bulan</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salaries as $sal)
        <tr>
            <td>{{ $sal->id }}</td>
            <td>{{ $sal->employee->nama_lengkap ?? 'Tidak ada' }}</td>
            <td>{{ $sal->bulan }}</td>
            <td>Rp {{ number_format($sal->employee->position->gaji_pokok ?? $sal->gaji_pokok ?? 0, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($sal->tunjangan ?? 0, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($sal->potongan ?? 0, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($sal->total_gaji ?? 0, 0, ',', '.') }}</td>
            <td class="d-flex">
                <a href="{{ route('salaries.edit', $sal->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                <form action="{{ route('salaries.destroy', $sal->id) }}" method="POST" class="d-inline">
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