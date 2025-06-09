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
                'nama' => 'PT Botika Teknologi Indonesia',
                'bidang_usaha' => 'Start-up AI',
                'alamat' => 'Jl Perumnas Blok E III No 50, Seturan, Sleman, Yogyakarta',
                'kontak' => '0818-0220-7000',
                'email' => 'admin@botika.online',
                'website' => 'https://botikaonline.com',
            ],
            [
                'nama' => 'PT Gamatechno Indonesia',
                'bidang_usaha' => 'Teknologi Informasi dan Komunikasi',
                'alamat' => 'Jl. Purwomartani, Sleman, Daerah Istimewa Yogyakarta',
                'kontak' => '+62-274-566161',
                'email' => 'info@gamatechno.com',
                'website' => 'https://gamatechno.co.id',
            ],
            [
                'nama' => 'CV Karya Hidup Sentosa',
                'bidang_usaha' => ' Alat Pertanian dan Sparepart Traktor',
                'alamat' => 'Jl. Magelang 144, Yogyakarta 55241 - Indonesia',
                'kontak' => '+62-274-512095',
                'email' => 'operator1@quick.co.id',
                'website' => 'https://quick.co.id',
            ],
            [
                'nama' => 'PT Aino indonesia',
                'bidang_usaha' => 'Teknologi Finansial',
                'alamat' => 'Vinolia Building, 3rd Floor, Jl. Urip Sumoharjo No.35, Yogyakarta, 55222',
                'kontak' => '+62 21 29069515',
                'email' => 'info@ainosi.co.id',
                'website' => 'https://ainosi.co.id',
            ],
            [
                'nama' => 'PT Divistant Teknologi Indonesia',
                'bidang_usaha' => 'Teknologi Informasi dan Komunikasi',
                'alamat' => 'Jl. Ampel No.23, Demangan Baru, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281',
                'kontak' => '(021)39702834',
                'email' => 'halo@divistant.com',
                'website' => 'https://divistant.com',
            ],
        ]);
    }
}
