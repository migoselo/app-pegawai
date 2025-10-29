@extends('layouts.master')
@section('title', 'Edit Position')

@section('content')
<h3>Edit Position</h3>
<form action="{{ route('positions.update', $position->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Jabatan</label>
        <input type="text" name="nama_jabatan" class="form-control" value="{{ $position->nama_jabatan }}" required> 
    </div>
    <div class="mb-3">
        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" class="form-control" value="{{ $position->gaji_pokok }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
