<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkTerkait extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'url', 'logo_image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
