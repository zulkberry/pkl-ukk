<?php

namespace Database\Seeders;

use App\Models\Industri;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Industri::insert([
            [
                'nama' => 'PT. BioRevenant Corp',
                'bidang_usaha' => 'Riset Bioteknologi & Survival Taktis',
                'alamat' => 'Jl. Mayat Hidup No. 13',
                'kontak' => '08666677711',
                'email' => 'contact@biorevenant.co.zm',
                'website' => 'www.biorevenant.co.zm',
            ],
        ]);
    }
}
