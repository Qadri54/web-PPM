<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profil;
use App\Models\Layanan;
use App\Models\Pengaturan;
use App\Models\Banner;
use App\Models\KategoriDokumen;
use App\Models\Dokumen;
use App\Models\Galeri;
use App\Models\TugasFungsi;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Users
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@poltekkes-medan.ac.id',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
        ]);

        // Pengaturan
        \App\Models\Pengaturan::create([
            'user_id' => null,
            'address' => 'Jl. Jamin Ginting No.Km. 13,5, Lau Cih, Kec. Medan Tuntungan, Kota Medan, Sumatera Utara 20137',
            'phone' => '+62 61 8368633',
            'email' => 'ppm@poltekkes-medan.ac.id',
            'operational_hours' => 'Senin - Jumat: 08:00 - 16:00',
            'social_media_links' => [
                ['url' => 'https://instagram.com/poltekkesmedan', 'platform' => 'instagram', ],
                ['url' => 'https://youtube.com/poltekkesmedan', 'platform' => 'youtube', ],
                ['url' => 'https://www.tiktok.com/@polkesmedan', 'platform' => 'tiktok', ],
            ],
            'google_maps_embed' => '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15929.33336414485!2d98.60643145783489!3d3.510138808256076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312452458d243f%3A0xf9ebdd1dbf4f271a!2sPoltekkes%20Medan!5e0!3m2!1sid!2sid!4v1790157321478!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"strict-origin-when-cross-origin\"></iframe>',
        ]);

        // Banners
        \App\Models\Banner::create([
            'user_id' => null,
            'image_path' => 'banners/01M35S3WKSXFVW9MXWB1S4EQ74.jpg',
            'title' => 'Menyala Bersama Mutu, Poltekkes Berdaya Saing Global',
            'subtitle' => 'Mengawal standar mutu pendidikan tinggi kesehatan guna menghasilkan lulusan yang kompeten, profesional, dan berdaya saing global.',
            'link_cta' => 'https://poltekkes-medan.ac.id/',
            'order' => '1',
            'is_active' => '1',
        ]);

        \App\Models\Banner::create([
            'user_id' => null,
            'image_path' => 'banners/01M35S4C625XJ2BHFT4MGA2379.jpg',
            'title' => 'Transparansi Dokumen & Standar Operasional',
            'subtitle' => 'Pusat informasi terpadu penyedia dokumen, pedoman, dan standar operasional untuk mewujudkan tata kelola akademik yang transparan dan akuntabel.',
            'link_cta' => '/dokumen',
            'order' => '2',
            'is_active' => '1',
        ]);

        // Profil
        \App\Models\Profil::create([
            'user_id' => null,
            'sambutan_image' => '01M35S83RSH4V2ESKBHT9VDKPR.png',
            'sambutan_name' => 'apt. Ahmad Purnawarman Faisal, S.Farm., M.Farm',
            'sambutan_title' => 'Kepala Pusat Penjaminan Mutu',
            'sambutan_text' => '<p>Puji syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya, laman Pusat Penjaminan Mutu Poltekkes ini dapat dihadirkan sebagai sarana informasi dan komunikasi bagi seluruh pemangku kepentingan.</p><p>Laman ini merupakan wujud komitmen kami dalam mendukung budaya mutu secara berkelanjutan. Kami berharap kehadiran laman ini dapat memberikan manfaat yang optimal sebagai media transparansi, akuntabilitas, dan penguatan tata kelola mutu yang berkelanjutan demi menghasilkan SDM kesehatan yang berdaya saing global.</p>',
            'struktur_image' => '01M3726GZ5Y1B7QD12ZSR7J8Y9.jpg',
            'tupoksi_text' => 'tes',
        ]);

        // Layanan
        \App\Models\Layanan::create([
            'user_id' => null,
            'name' => 'Audit Mutu Internal',
            'icon_image' => null,
            'description' => 'Melaksanakan audit mutu secara berkala memastikan kepatuhan standar.',
            'is_active' => '1',
        ]);

        \App\Models\Layanan::create([
            'user_id' => null,
            'name' => 'Standar & SOP',
            'icon_image' => null,
            'description' => 'Menyusun dan mengelola dokumen mutu serta SOP lembaga.',
            'is_active' => '1',
        ]);

        \App\Models\Layanan::create([
            'user_id' => null,
            'name' => 'Monitoring & Evaluasi',
            'icon_image' => null,
            'description' => 'Evaluasi pelaksanaan standar mutu di seluruh unit kerja.',
            'is_active' => '1',
        ]);

        \App\Models\Layanan::create([
            'user_id' => null,
            'name' => 'Akreditasi',
            'icon_image' => null,
            'description' => 'Mengkoordinasikan akreditasi institusi maupun prodi.',
            'is_active' => '1',
        ]);

        \App\Models\Layanan::create([
            'user_id' => null,
            'name' => 'Pelatihan Mutu',
            'icon_image' => null,
            'description' => 'Pelatihan dan sosialisasi sistem penjaminan mutu.',
            'is_active' => '1',
        ]);

        \App\Models\Layanan::create([
            'user_id' => null,
            'name' => 'Database Mutu',
            'icon_image' => null,
            'description' => 'Mengelola sistem informasi penjaminan mutu kampus.',
            'is_active' => '1',
        ]);

        // Galeri
        \App\Models\Galeri::create([
            'user_id' => null,
            'title' => 'Rapat Tinjauan Manajemen 2025',
            'image_path' => 'banners/01M35S3WKSXFVW9MXWB1S4EQ74.jpg',
            'category_label' => 'Rapat',
            'date_event' => '2025-01-15',
            'description' => 'Pelaksanaan Rapat Tinjauan Manajemen (RTM) tingkat institusi tahun 2025.',
        ]);

        \App\Models\Galeri::create([
            'user_id' => null,
            'title' => 'Audit Mutu Internal Semester Ganjil',
            'image_path' => 'banners/01M35S3WKSXFVW9MXWB1S4EQ74.jpg',
            'category_label' => 'Audit',
            'date_event' => '2024-12-10',
            'description' => 'Kegiatan AMI pada seluruh program studi di lingkungan Poltekkes Kemenkes Medan.',
        ]);

        \App\Models\Galeri::create([
            'user_id' => null,
            'title' => 'Sosialisasi Instrumen Akreditasi Baru',
            'image_path' => 'banners/01M35S3WKSXFVW9MXWB1S4EQ74.jpg',
            'category_label' => 'Sosialisasi',
            'date_event' => '2024-11-05',
            'description' => 'Sosialisasi pengisian borang akreditasi 9 kriteria.',
        ]);

        \App\Models\Galeri::create([
            'user_id' => null,
            'title' => 'Workshop Penyusunan SOP',
            'image_path' => 'banners/01M35S3WKSXFVW9MXWB1S4EQ74.jpg',
            'category_label' => 'Workshop',
            'date_event' => '2024-10-20',
            'description' => 'Pelatihan penyusunan dokumen Standar Operasional Prosedur bagi tenaga pendidik dan kependidikan.',
        ]);

        // Kategori Dokumen
        \App\Models\KategoriDokumen::create([
            'user_id' => null,
            'name' => 'SOP (Standar Operasional Prosedur)',
        ]);

        \App\Models\KategoriDokumen::create([
            'user_id' => null,
            'name' => 'Surat Keputusan (SK)',
        ]);

        \App\Models\KategoriDokumen::create([
            'user_id' => null,
            'name' => 'Pedoman Mutu',
        ]);

        \App\Models\KategoriDokumen::create([
            'user_id' => null,
            'name' => 'Instrumen Audit',
        ]);

        // Dokumen
        \App\Models\Dokumen::create([
            'kategori_id' => '1',
            'user_id' => null,
            'code' => 'SOP-001',
            'name' => 'SOP Pelaksanaan Ujian Akhir Semester',
            'tahun_terbit' => '2025',
            'file_path' => 'dokumens/dummy-file.pdf',
        ]);

        \App\Models\Dokumen::create([
            'kategori_id' => '1',
            'user_id' => null,
            'code' => 'SOP-002',
            'name' => 'SOP Bimbingan Skripsi/KTI',
            'tahun_terbit' => '2024',
            'file_path' => 'dokumens/dummy-file.pdf',
        ]);

        \App\Models\Dokumen::create([
            'kategori_id' => '2',
            'user_id' => null,
            'code' => 'SK-015',
            'name' => 'SK Tim Penjaminan Mutu Internal',
            'tahun_terbit' => '2025',
            'file_path' => 'dokumens/dummy-file.pdf',
        ]);

        \App\Models\Dokumen::create([
            'kategori_id' => '2',
            'user_id' => null,
            'code' => 'SK-016',
            'name' => 'SK Penetapan Auditor Internal',
            'tahun_terbit' => '2024',
            'file_path' => 'dokumens/dummy-file.pdf',
        ]);

        \App\Models\Dokumen::create([
            'kategori_id' => '3',
            'user_id' => null,
            'code' => 'PM-001',
            'name' => 'Buku Pedoman Sistem Penjaminan Mutu Internal (SPMI)',
            'tahun_terbit' => '2024',
            'file_path' => 'dokumens/dummy-file.pdf',
        ]);

        \App\Models\Dokumen::create([
            'kategori_id' => '4',
            'user_id' => null,
            'code' => 'IA-001',
            'name' => 'Instrumen Audit Mutu Akademik',
            'tahun_terbit' => '2025',
            'file_path' => 'dokumens/dummy-file.pdf',
        ]);

        // Tugas Fungsi
        \App\Models\TugasFungsi::create([
            'title' => 'Perencanaan Mutu',
            'description' => 'Menyusun kebijakan, program kerja, dan rencana strategis penjaminan mutu serta mengembangkan standar mutu pendidikan.',
            'order' => '1',
            'is_active' => '1',
        ]);

        \App\Models\TugasFungsi::create([
            'title' => 'Pelaksanaan Sistem Penjaminan Mutu',
            'description' => 'Mengoordinasikan implementasi SPMI di seluruh unit kerja dan memastikan siklus PPEPP berjalan efektif.',
            'order' => '2',
            'is_active' => '1',
        ]);

        \App\Models\TugasFungsi::create([
            'title' => 'Monitoring dan Evaluasi',
            'description' => 'Melaksanakan audit mutu internal (AMI) secara berkala dan melakukan evaluasi terhadap capaian standar mutu.',
            'order' => '3',
            'is_active' => '1',
        ]);

    }
}
