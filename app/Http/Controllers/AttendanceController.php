<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    public function index(): View
    {
        $attendances = Attendance::with('employee')->latest()->paginate(15);
        return view('attendance.index', compact('attendances'));
    }

    public function create(): View
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i', 
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|in:Hadir,Izin,Sakit,Alpha'
        ]);

        Attendance::create($validatedData);
        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function edit(Attendance $attendance): View
    {
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, Attendance $attendance): RedirectResponse
    {
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i:s', // Tambah waktu masuk/keluar
            'waktu_keluar' => 'nullable|date_format:H:i:s',
            'status_absensi' => 'required|in:Hadir,Izin,Sakit,Alpha'
        ]);

        $attendance->update($validatedData);
        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy(Attendance $attendance): RedirectResponse
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil dihapus.');
    }
}