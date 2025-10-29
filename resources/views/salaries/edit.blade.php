@extends('layouts.master')
@section('title', 'Edit Gaji')

@section('content')
<h3>Edit Gaji</h3>
<form action="{{ route('salaries.update', $salary->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Karyawan</label>
        <select name="karyawan_id" class="form-control" required>
            @foreach ($employees as $emp)
                <option value="{{ $emp->id }}" 
                    {{ $salary->karyawan_id == $emp->id ? 'selected' : '' }}>
                    {{ $emp->nama_lengkap }} (Gaji Pokok: Rp {{ number_format($emp->position->gaji_pokok ?? 0, 0, ',', '.') }})
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label>Bulan</label>
        <input type="text" name="bulan" value="{{ old('bulan', $salary->bulan) }}" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Tunjangan</label>
        <input type="number" name="tunjangan" value="{{ old('tunjangan', $salary->tunjangan) }}" class="form-control" required min="0">
    </div>

    <div class="mb-3">
        <label>Potongan</label>
        <input type="number" name="potongan" value="{{ old('potongan', $salary->potongan) }}" class="form-control" required min="0">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
</form>

<div class="mb-3 mt-3">
    <label>Total Gaji</label>
    <input type="text" id="total_gaji" class="form-control" readonly>
</div>

<script>
    const tunjanganInput = document.querySelector('input[name="tunjangan"]');
    const potonganInput = document.querySelector('input[name="potongan"]');
    const karyawanSelect = document.querySelector('select[name="karyawan_id"]');
    const totalInput = document.getElementById('total_gaji');

    function updateTotal() {
        const selectedOption = karyawanSelect.options[karyawanSelect.selectedIndex].text;
        const match = selectedOption.match(/Gaji Pokok: Rp ([\d.]+)/);
        const gajiPokok = match ? parseInt(match[1].replace(/\./g, '')) : 0;
        const tunjangan = parseInt(tunjanganInput.value || 0);
        const potongan = parseInt(potonganInput.value || 0);

        const total = gajiPokok + tunjangan - potongan;
        totalInput.value = 'Rp ' + total.toLocaleString('id-ID');
    }

    tunjanganInput.addEventListener('input', updateTotal);
    potonganInput.addEventListener('input', updateTotal);
    karyawanSelect.addEventListener('change', updateTotal);

    updateTotal();
</script>
@endsection
