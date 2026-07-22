<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        Siswa::create([
            'nama' => 'Herman Santoyo',
            'kelas' => 'X RPL 1'
        ]);

        Siswa::create([
            'nama' => 'Santoso Agung',
            'kelas' => 'X RPL 2'
        ]);
    }
}
