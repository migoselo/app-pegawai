<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::truncate(); 
        Department::insert([
            ['nama_departemen' => 'HRD', 'deskripsi' => 'Departemen Sumber Daya Manusia'],
            ['nama_departemen' => 'Keuangan', 'deskripsi' => 'Departemen Keuangan dan Akuntansi'],
            ['nama_departemen' => 'Produksi', 'deskripsi' => 'Departemen Produksi dan Operasional'],
            ['nama_departemen' => 'Pemasaran', 'deskripsi' => 'Departemen Marketing dan Penjualan'],
            ['nama_departemen' => 'IT Support', 'deskripsi' => 'Departemen Teknologi Informasi dan Dukungan Sistem'],
        ]);
    }
}
