<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::insert([
            [
                'nama' => 'Michael Clifford',
                'nip' => '197203172005011012',
                'gender' => 'L',
                'alamat' => 'Bekasi, Indonesia',
                'kontak' => '081582394717',
                'email' => 'michael@gmail.com',
            ],
            [
                'nama' => 'Luke Hemmings',
                'nip' => '199303012019031011',
                'gender' => 'L',
                'alamat' => 'Surabaya, Indonesia',
                'kontak' => '081332248813',
                'email' => 'luke@gmail.com',
            ],
        ]);
    }
}