@extends('layouts.master')
@section('title','Daftar Pegawai')
@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Daftar Pegawai</h2>
        <a href="{{ route('employees.create') }}" 
           class="btn text-white fw-semibold px-4 py-2"
           style="background: linear-gradient(135deg, #2c2c2c, #5e5e5e); border: none; border-radius: 8px;">
            + Tambah Pegawai
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center" style="min-width: 1200px;">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Masuk</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $e)
                <tr>
                    <td>{{ $e->nama_lengkap }}</td>
                    <td>{{ $e->email }}</td>
                    <td>{{ $e->nomor_telepon }}</td>
                    <td>{{ $e->tanggal_lahir }}</td>
                    <td class="text-start">{{ $e->alamat }}</td>
                    <td>{{ $e->tanggal_masuk }}</td>
                    <td>{{ $e->department?->nama_departemen }}</td>
                    <td>{{ $e->position?->nama_jabatan }}</td>
                    <td>
                        @if($e->status == 'aktif')
                            <span class="badge bg-success px-3 py-2 text-capitalize">Aktif</span>
                        @else
                            <span class="badge bg-danger px-3 py-2 text-capitalize">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('employees.show',$e->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="{{ route('employees.edit',$e->id) }}" class="btn btn-warning btn-sm text-white">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('employees.destroy',$e->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $employees->links() }}
    </div>
</div>
@endsection
