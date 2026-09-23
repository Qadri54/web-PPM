<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\KategoriDokumen;
use App\Models\Dokumen;
use App\Models\Profil;
use App\Models\Layanan;
use App\Models\Galeri;
use App\Models\Banner;
use App\Models\Pengaturan;
use App\Models\TugasFungsi;

$output = "<?php\n\nnamespace Database\Seeders;\n\nuse Illuminate\Database\Seeder;\nuse Illuminate\Support\Facades\Hash;\n";
$output .= "use App\Models\User;\nuse App\Models\Profil;\nuse App\Models\Layanan;\nuse App\Models\Pengaturan;\nuse App\Models\Banner;\nuse App\Models\KategoriDokumen;\nuse App\Models\Dokumen;\nuse App\Models\Galeri;\nuse App\Models\TugasFungsi;\n\n";
$output .= "class DatabaseSeeder extends Seeder\n{\n    public function run(): void\n    {\n";

$output .= "        // 1. Users\n";
$output .= "        User::create([\n            'name' => 'Super Admin',\n            'email' => 'admin@poltekkes-medan.ac.id',\n            'password' => Hash::make('password'),\n            'role' => 'super_admin',\n        ]);\n\n";

function exportTable($modelClass, $name) {
    $rows = $modelClass::all()->toArray();
    $out = "        // $name\n";
    foreach ($rows as $row) {
        unset($row['id']);
        unset($row['created_at']);
        unset($row['updated_at']);
        
        $out .= "        \\$modelClass::create([\n";
        foreach ($row as $key => $value) {
            if (is_array($value)) {
                $out .= "            '$key' => [\n";
                foreach ($value as $item) {
                    $out .= "                [";
                    foreach($item as $k => $v) {
                         $out .= "'$k' => '" . addslashes((string)$v) . "', ";
                    }
                    $out .= "],\n";
                }
                $out .= "            ],\n";
            } else if (is_null($value)) {
                $out .= "            '$key' => null,\n";
            } else {
                $out .= "            '$key' => '" . addslashes((string)$value) . "',\n";
            }
        }
        $out .= "        ]);\n\n";
    }
    return $out;
}

$output .= exportTable(Pengaturan::class, "Pengaturan");
$output .= exportTable(Banner::class, "Banners");
$output .= exportTable(Profil::class, "Profil");
$output .= exportTable(Layanan::class, "Layanan");
$output .= exportTable(Galeri::class, "Galeri");
$output .= exportTable(KategoriDokumen::class, "Kategori Dokumen");
$output .= exportTable(Dokumen::class, "Dokumen");
$output .= exportTable(TugasFungsi::class, "Tugas Fungsi");

$output .= "    }\n}\n";

file_put_contents(__DIR__ . '/database/seeders/DatabaseSeeder.php', $output);
echo "DatabaseSeeder.php generated successfully!";
