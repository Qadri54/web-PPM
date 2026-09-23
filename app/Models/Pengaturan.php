<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'address', 'phone', 'email', 'operational_hours', 'social_media_links', 'google_maps_embed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'social_media_links' => 'array'
    ];
}
