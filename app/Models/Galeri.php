<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'title',
        'category_label', 
        'image_path', 
        'date_event', 
        'description'
    ];

    protected $casts = [
        'date_event' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
