@extends('layouts.master')
@section('title','Tambah Pegawai')
@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-dark text-white fw-bold fs-4">
            Form Pegawai
        </div>
        <div class="card-body px-5 py-4">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-semibold">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-semibold">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-semibold">Nomor Telepon</label>
                    <div class="col-sm-9">
                        <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}" placeholder="Masukkan nomor telepon">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-semibold">Tanggal Lahir</label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-semibold">Alamat</label>
                    <div class="col-sm-9">
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-semibold">Tanggal Masuk</label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-semibold">Departemen</label>
                    <div class="col-sm-9">
                        <select name="departemen_id" class="form-select">
                            <option value="">-- Pilih Departemen --</option>
                            @foreach($departments as $d)
                                <option value="{{ $d->id }}">{{ $d->nama_departemen }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-semibold">Jabatan</label>
                    <div class="col-sm-9">
                        <select name="jabatan_id" class="form-select">
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach($positions as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label fw-semibold">Status</label>
                    <div class="col-sm-9">
                        <select name="status" class="form-select">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" 
                            class="btn text-white px-4 py-2 fw-semibold"
                            style="background: linear-gradient(135deg, #2c2c2c, #5e5e5e); border-radius: 8px;">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
