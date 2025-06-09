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
                'kontak' => '08199887',
                'email' => 'ninunana@gmail.com',
                'status' => 0,
            ],
            [
                'nama' => 'Thara Bunga Novriansyah',
                'nis' => '20454',
                'gender' => 'P',
                'alamat' => 'Kasihan, Bantul, Yogyakarta',
                'kontak' => '088123456789',
                'email' => '20454@sija.com',
                'status' => 0,
            ],
            [
                'nama' => 'Shafwan Ilham Dzaky',
                'nis' => '20452',
                'gender' => 'L',
                'alamat' => 'Melati, Sleman, Yogyakarta',
                'kontak' => '088123456789',
                'email' => '20452@sija.com',
                'status' => 0,
            ],
            [
                'nama' => 'Sabian Raka Pramuditya',
                'nis' => '20450',
                'gender' => 'L',
                'alamat' => 'Pakem, Sleman, Yogyakarta',
                'kontak' => '088123456789',
                'email' => '20450@sija.com',
                'status' => 0,
            ],
            [
                'nama' => 'Tsabita Irene Adielia',
                'nis' => '20455',
                'gender' => 'P',
                'alamat' => 'Berbah, Sleman, Yogyakarta',
                'kontak' => '088123456789',
                'email' => '20455@sija.com',
                'status' => 0,
            ],
        ]);
    }
}
