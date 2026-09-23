<?php
$models = [
    'Banner' => ['user_id', 'image_path', 'title', 'subtitle', 'link_cta', 'order', 'is_active'],
    'Profil' => ['user_id', 'sambutan_image', 'sambutan_name', 'sambutan_title', 'sambutan_text', 'struktur_image', 'tupoksi_text'],
    'Layanan' => ['user_id', 'name', 'icon_image', 'description', 'is_active'],
    'LinkTerkait' => ['user_id', 'name', 'url', 'logo_image'],
    'KategoriDokumen' => ['user_id', 'name'],
    'Dokumen' => ['user_id', 'kategori_id', 'code', 'name', 'tahun_terbit', 'file_path'],
    'Galeri' => ['user_id', 'title', 'image_path', 'date_event', 'description'],
    'Pengaturan' => ['user_id', 'address', 'phone', 'email', 'operational_hours', 'social_media_links', 'google_maps_embed']
];

foreach ($models as $name => $fillable) {
    $fillableStr = implode("', '", $fillable);
    $content = "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Factories\HasFactory;\nuse Illuminate\Database\Eloquent\Model;\n\nclass {$name} extends Model\n{\n    use HasFactory;\n\n    protected \$fillable = ['{$fillableStr}'];\n\n    public function user()\n    {\n        return \$this->belongsTo(User::class);\n    }\n";
    
    if ($name === 'Dokumen') {
        $content .= "\n    public function kategori()\n    {\n        return \$this->belongsTo(KategoriDokumen::class, 'kategori_id');\n    }\n";
    }
    
    if ($name === 'KategoriDokumen') {
        $content .= "\n    public function dokumens()\n    {\n        return \$this->hasMany(Dokumen::class, 'kategori_id');\n    }\n";
    }
    
    if ($name === 'Pengaturan') {
        $content .= "\n    protected \$casts = [\n        'social_media_links' => 'array'\n    ];\n";
    }
    
    $content .= "}\n";
    file_put_contents(__DIR__ . "/app/Models/{$name}.php", $content);
}
echo "Models generated successfully!\n";
