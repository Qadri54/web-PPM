<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'sambutan_image', 'sambutan_name', 'sambutan_title', 'sambutan_text', 'struktur_image', 'tupoksi_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
