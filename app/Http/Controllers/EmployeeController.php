<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::with(['department','position'])->latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create(): View
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments','positions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'nullable|string|max:15',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'tanggal_masuk' => 'nullable|date',
            'departemen_id' => 'nullable|exists:departments,id',
            'jabatan_id' => 'nullable|exists:positions,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Employee::create($validatedData);
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function show(Employee $employee): View
    {
        $employee->load(['department','position']);
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee): View
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee','departments','positions'));
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'nomor_telepon' => 'nullable|string|max:15',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'tanggal_masuk' => 'nullable|date',
            'departemen_id' => 'nullable|exists:departments,id',
            'jabatan_id' => 'nullable|exists:positions,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $employee->update($validatedData); // Menggunakan data yang sudah divalidasi
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus.');
    }

    public function generateBulanBaru()
{
    $bulanSekarang = date('F');
    $employees = Employee::with('position')->where('status', 'aktif')->get();

    foreach ($employees as $emp) {
        $sudahAda = Salary::where('karyawan_id', $emp->id)
                          ->where('bulan', $bulanSekarang)
                          ->exists();
        if (!$sudahAda) {
            $gaji_pokok = $emp->position->gaji_pokok ?? 0;
            Salary::create([
                'karyawan_id' => $emp->id,
                'bulan'       => $bulanSekarang,
                'gaji_pokok'  => $gaji_pokok,
                'tunjangan'   => 0,
                'potongan'    => 0,
                'total_gaji'  => $gaji_pokok,
            ]);
        }
    }
    return redirect()->route('salaries.index')
        ->with('success', "Data gaji untuk bulan $bulanSekarang berhasil dibuat otomatis!");
}

}