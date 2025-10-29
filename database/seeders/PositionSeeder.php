<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        Position::truncate();

        Position::insert([
            ['nama_jabatan' => 'Manager', 'gaji_pokok' => 8000000],
            ['nama_jabatan' => 'Supervisor', 'gaji_pokok' => 6000000],
            ['nama_jabatan' => 'Staff', 'gaji_pokok' => 4000000],
            ['nama_jabatan' => 'Operator', 'gaji_pokok' => 3500000],
            ['nama_jabatan' => 'Intern', 'gaji_pokok' => 2000000],
        ]);
    }
}
