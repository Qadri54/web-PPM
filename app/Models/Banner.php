<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image_path', 'title', 'subtitle', 'link_cta', 'order', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
