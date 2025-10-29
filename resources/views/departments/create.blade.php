@extends('layouts.master')
@section('title', 'Tambah Department')
@section('content')
<h3>Tambah Department</h3>
<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Department</label>
        <input type="text" name="nama_departemen" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
