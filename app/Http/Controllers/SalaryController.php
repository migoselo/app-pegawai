<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
{
    // Load relasi employee + position
    $salaries = Salary::with(['employee.position'])->get();

    return view('salaries.index', compact('salaries'));
}


    public function edit($id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::with('position')->get();

        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $salary = Salary::findOrFail($id);
        $employee = $salary->employee;
        $gaji_pokok = $employee->position->gaji_pokok ?? 0;
        $total_gaji = $gaji_pokok + $request->tunjangan - $request->potongan;

        $salary->update([
            'bulan' => $request->bulan,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total_gaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Salary::findOrFail($id)->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus!');
    }
}
