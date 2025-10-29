@extends('layouts.master')
@section('title','Edit Pegawai')
@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg border-0 w-50">
        <div class="card-header bg-white text-center border-bottom-0">
            <h4 class="mb-0 fw-bold text-dark">Edit Pegawai</h4>
        </div>

        <div class="card-body bg-light">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control"
                        value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $employee->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control"
                        value="{{ old('nomor_telepon', $employee->nomor_telepon) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control"
                        value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $employee->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control"
                        value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Departemen</label>
                    <select name="departemen_id" class="form-select">
                        <option value="">-- Pilih Departemen --</option>
                        @foreach($departments as $d)
                            <option value="{{ $d->id }}" {{ old('departemen_id', $employee->departemen_id)==$d->id ? 'selected' : '' }}>
                                {{ $d->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jabatan</label>
                    <select name="jabatan_id" class="form-select">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($positions as $p)
                            <option value="{{ $p->id }}" {{ old('jabatan_id', $employee->jabatan_id)==$p->id ? 'selected' : '' }}>
                                {{ $p->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="aktif" {{ old('status', $employee->status)=='aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status', $employee->status)=='nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" 
                            class="btn text-white px-4 fw-semibold"
                            style="background: linear-gradient(135deg, #2c2c2c, #5e5e5e); border-radius: 8px;">
                        Update
                    </button>
                    <a href="{{ route('employees.index') }}" 
                       class="btn btn-outline-secondary px-4 ms-2 rounded-3 fw-semibold">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
