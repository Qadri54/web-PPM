<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\Profil;
use App\Models\Layanan;
use App\Models\LinkTerkait;

class BerandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Banners
        Banner::truncate();
        Banner::create([
            'image_path' => 'banners/dummy-banner1.png',
            'title' => 'Menyala Bersama Mutu, Poltekkes Berdaya Saing Global',
            'subtitle' => 'Mengawal standar mutu pendidikan tinggi kesehatan guna menghasilkan lulusan yang kompeten, profesional, dan berdaya saing global.',
            'link_cta' => '/profil/struktur',
            'order' => 1,
            'is_active' => true,
        ]);
        Banner::create([
            'image_path' => 'banners/dummy-banner2.png',
            'title' => 'Transparansi Dokumen & Standar Operasional',
            'subtitle' => 'Pusat informasi terpadu penyedia dokumen, pedoman, dan standar operasional untuk mewujudkan tata kelola akademik yang transparan dan akuntabel.',
            'link_cta' => '/dokumen',
            'order' => 2,
            'is_active' => true,
        ]);

        // 2. Seed Profil (Sambutan)
        Profil::truncate();
        Profil::create([
            'sambutan_image' => 'profils/dummy-kepala.png',
            'sambutan_name' => 'apt. Ahmad Purnawarman Faisal, S.Farm., M.Farm',
            'sambutan_title' => 'Kepala Pusat Penjaminan Mutu',
            'sambutan_text' => '<p>Puji syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya, laman Pusat Penjaminan Mutu Poltekkes ini dapat dihadirkan sebagai sarana informasi dan komunikasi bagi seluruh pemangku kepentingan.</p><p>Laman ini merupakan wujud komitmen kami dalam mendukung budaya mutu secara berkelanjutan. Kami berharap kehadiran laman ini dapat memberikan manfaat yang optimal sebagai media transparansi, akuntabilitas, dan penguatan tata kelola mutu yang berkelanjutan demi menghasilkan SDM kesehatan yang berdaya saing global.</p>',
            'struktur_image' => 'profils/dummy-kepala.png',
            'tupoksi_text' => '<p>Menyelenggarakan sistem penjaminan mutu internal secara berkelanjutan.</p>'
        ]);

        // 3. Seed Layanans
        Layanan::truncate();
        $layanans = [
            ['name' => 'Audit Mutu Internal', 'description' => 'Melaksanakan audit mutu secara berkala memastikan kepatuhan standar.'],
            ['name' => 'Standar & SOP', 'description' => 'Menyusun dan mengelola dokumen mutu serta SOP lembaga.'],
            ['name' => 'Monitoring & Evaluasi', 'description' => 'Evaluasi pelaksanaan standar mutu di seluruh unit kerja.'],
            ['name' => 'Akreditasi', 'description' => 'Mengkoordinasikan akreditasi institusi maupun prodi.'],
            ['name' => 'Pelatihan Mutu', 'description' => 'Pelatihan dan sosialisasi sistem penjaminan mutu.'],
            ['name' => 'Database Mutu', 'description' => 'Mengelola sistem informasi penjaminan mutu kampus.']
        ];
        
        foreach ($layanans as $layanan) {
            Layanan::create([
                'name' => $layanan['name'],
                'description' => $layanan['description'],
                'is_active' => true,
            ]);
        }

        // 4. Seed Link Terkait
        LinkTerkait::truncate();
        $links = [
            ['name' => 'Kementerian Kesehatan', 'url' => 'https://kemkes.go.id'],
            ['name' => 'BAN-PT', 'url' => 'https://banpt.or.id'],
            ['name' => 'LAM-PTKes', 'url' => 'https://lamptkes.org'],
            ['name' => 'Sistem SPMI', 'url' => '#']
        ];

        foreach ($links as $link) {
            LinkTerkait::create([
                'name' => $link['name'],
                'url' => $link['url'],
                'logo_image' => 'link-terkait/dummy-kemenkes.png'
            ]);
        }
    }
}
