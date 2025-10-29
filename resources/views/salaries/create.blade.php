@extends('layouts.master')
@section('title', 'Tambah Gaji')
@section('content')
<h3>Tambah Gaji</h3>
<form action="{{ route('salaries.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Karyawan</label>
        <select name="karyawan_id" class="form-control" required>
            <option value="">-- Pilih Karyawan --</option>
            @foreach ($employees as $emp)
                <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
                    {{ $emp->nama_lengkap }} (Gaji Pokok: Rp {{ number_format($emp->position->gaji_pokok ?? 0, 0, ',', '.') }})
                </option>
            @endforeach
        </select>
        @error('karyawan_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    
    <div class="mb-3">
        <label>Bulan (Contoh: Januari 2025)</label>
        <input type="text" name="bulan" value="{{ old('bulan') }}" class="form-control" required>
        @error('bulan') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    
    <div class="mb-3">
        <label>Tunjangan</label>
        <input type="number" name="tunjangan" value="{{ old('tunjangan', 0) }}" class="form-control" min="0">
        @error('tunjangan') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Potongan</label>
        <input type="number" name="potongan" value="{{ old('potongan', 0) }}" class="form-control" min="0">
        @error('potongan') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan Gaji</button>
    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection