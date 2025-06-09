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
                'nama' => 'Sugiarto, S.T.',
                'nip' => '19720317 200501 1 012',
                'gender' => 'L',
                'alamat' => 'Cangkringan, Sleman, D.I.Yogyakarta',
                'kontak' => '085679012567',
                'email' => 'sugiarto@guru.sija',
            ],
            [
                'nama' => 'Eka Nur Ahmad Romadhoni, S.Pd.',
                'nip' => '19930301 201903 1 011',
                'gender' => 'L',
                'alamat' => 'Klaten, Jawa Tengah',
                'kontak' => '085679018906',
                'email' => 'eka@guru.sija',
            ],
            [
                'nama' => 'Rr. Retna Trimantaraningsih, S.T.',
                'nip' => '19700627 202121 2 002',
                'gender' => 'P',
                'alamat' => 'Tridadi, Sleman, D.I.Yogyakarta',
                'kontak' => '085679018007',
                'email' => 'retna@guru.sija',
            ],
            [
                'nama' => 'Ratna Yunita Sari, S.T.',
                'nip' => '19710601 202121 2 002',
                'gender' => 'P',
                'alamat' => 'Seyegan, Sleman, D.I.Yogyakarta',
                'kontak' => '085867456623',
                'email' => 'ratna@guru.sija',
            ],
            [
                'nama' => 'Yunianto Hermawan, S.Kom.',
                'nip' => '19730620 200604 1 005',
                'gender' => 'L',
                'alamat' => 'Kalasan, Sleman, D.I.Yogyakarta',
                'kontak' => '089765436789',
                'email' => 'yunianto@guru.sija',
            ],
            [
                'nama' => 'Margaretha Endah Titisari, S.T.',
                'nip' => '19740302 200604 2 008',
                'gender' => 'P',
                'alamat' => 'Prambanan, Sleman, D.I.Yogyakarta',
                'kontak' => '087612567688',
                'email' => 'endah@guru.sija',
            ],
        ]);
    }
}