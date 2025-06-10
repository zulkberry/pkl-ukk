<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::insert([
            [
                'nama' => 'Ginanta Arya Bramantya',
                'nis' => '20401',
                'gender' => 'L',
                'alamat' => 'Lamongan, Indonesia',
                'kontak' => '08199887641',
                'email' => 'ninunana@gmail.com',
                'status' => 0,
            ],
            [
                'nama' => 'Prana Waluya Jati',
                'nis' => '20402',
                'gender' => 'L',
                'alamat' => 'Jogja, Indonesia',
                'kontak' => '08123456789',
                'email' => 'nananinu@gmail.com',
                'status' => 0,
            ],
            [
                'nama' => 'Jonathan Requiem',
                'nis' => '20345',
                'gender' => 'L',
                'alamat' => 'Jember, Indonesia',
                'kontak' => '01058239471',
                'email' => 'jemie@gmail.com',
                'status' => 0,
            ],
        ]);
    }
}
