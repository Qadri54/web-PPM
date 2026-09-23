<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'icon_image', 'description', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
