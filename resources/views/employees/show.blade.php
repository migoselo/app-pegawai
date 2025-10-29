@extends('layouts.master')
@section('title', 'Detail Pegawai')
@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg border-0 w-50" style="max-width: 800px;">
        <div class="card-header text-center border-0" 
             style="background: linear-gradient(135deg, #e0e0e0, #bfbfbf);">
            <h4 class="mb-0 fw-bold text-dark">Detail Pegawai</h4>
        </div>

        <div class="card-body bg-light">
            <div class="row mb-3">
                <div class="col-sm-4 fw-semibold text-secondary">Nama</div>
                <div class="col-sm-8">{{ $employee->nama_lengkap }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 fw-semibold text-secondary">Email</div>
                <div class="col-sm-8">{{ $employee->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 fw-semibold text-secondary">Nomor Telepon</div>
                <div class="col-sm-8">{{ $employee->nomor_telepon }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 fw-semibold text-secondary">Tanggal Lahir</div>
                <div class="col-sm-8">{{ $employee->tanggal_lahir }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 fw-semibold text-secondary">Alamat</div>
                <div class="col-sm-8">{{ $employee->alamat }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 fw-semibold text-secondary">Tanggal Masuk</div>
                <div class="col-sm-8">{{ $employee->tanggal_masuk }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 fw-semibold text-secondary">Departemen</div>
                <div class="col-sm-8">{{ $employee->department?->nama_departemen }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 fw-semibold text-secondary">Jabatan</div>
                <div class="col-sm-8">{{ $employee->position?->nama_jabatan }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4 fw-semibold text-secondary">Status</div>
                <div class="col-sm-8">
                    @if($employee->status == 'aktif')
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Nonaktif</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-footer text-center bg-white border-top-0 pb-4">
            <a href="{{ route('employees.index') }}" 
               class="btn btn-outline-secondary px-4 rounded-3">Kembali</a>
            <a href="{{ route('employees.edit', $employee->id) }}" 
               class="btn text-white px-4 rounded-3 ms-2"
               style="background: linear-gradient(135deg, #2c2c2c, #5e5e5e);">
               Edit
            </a>
        </div>
    </div>
</div>
@endsection
