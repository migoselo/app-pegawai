@extends('layouts.master')
@section('title', 'Edit Kehadiran')

@section('content')
<h3>Edit Kehadiran</h3>
<form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Karyawan</label>
        <select name="karyawan_id" class="form-control"> 
            @foreach ($employees as $emp)
                <option value="{{ $emp->id }}" {{ $attendance->karyawan_id == $emp->id ? 'selected' : '' }}>
                    {{ $emp->nama_lengkap }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $attendance->tanggal }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Waktu Masuk</label>
        <input type="time" name="waktu_masuk" value="{{ $attendance->waktu_masuk }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Waktu Keluar</label>
        <input type="time" name="waktu_keluar" value="{{ $attendance->waktu_keluar }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status_absensi" class="form-control">
            <option value="Hadir" {{ $attendance->status_absensi == 'Hadir' ? 'selected' : '' }}>Hadir</option>
            <option value="Izin"  {{ $attendance->status_absensi == 'Izin'  ? 'selected' : '' }}>Izin</option>
            <option value="Sakit" {{ $attendance->status_absensi == 'Sakit' ? 'selected' : '' }}>Sakit</option>
            <option value="Alpha" {{ $attendance->status_absensi == 'Alpha' ? 'selected' : '' }}>Alpha</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection