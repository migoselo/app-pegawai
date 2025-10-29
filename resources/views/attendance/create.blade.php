@extends('layouts.master')

@section('title', 'Tambah Kehadiran')

@section('content')
<h3>Tambah Kehadiran</h3>

<form action="{{ route('attendance.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Karyawan</label>
        <select name="karyawan_id" class="form-control"> {{-- Ubah name ke karyawan_id --}}
            @foreach ($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required> {{-- Ubah name ke tanggal --}}
    </div>

    <div class="mb-3">
        <label>Waktu Masuk</label>
        <input type="time" name="waktu_masuk" class="form-control"> {{-- Ubah name ke waktu_masuk --}}
    </div>

    <div class="mb-3">
        <label>Waktu Keluar</label>
        <input type="time" name="waktu_keluar" class="form-control"> {{-- Ubah name ke waktu_keluar --}}
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status_absensi" class="form-control"> {{-- Ubah name ke status_absensi --}}
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alpha">Alpha</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection