@extends('layouts.master')
@section('title', 'Tambah Position')

@section('content')
<h3>Tambah Position</h3>
<form action="{{ route('positions.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Jabatan</label>
        <input type="text" name="nama_jabatan" class="form-control" required> 
    </div>
    <div class="mb-3">
        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" class="form-control" required> 
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
