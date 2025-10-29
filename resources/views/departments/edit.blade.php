@extends('layouts.master')
@section('title', 'Edit Department')
@section('content')
<h3>Edit Department</h3>
<form action="{{ route('departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Department</label>
        <input type="text" name="nama_departemen" value="{{ $department->nama_departemen }}" class="form-control" required>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
