<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Banner;
use App\Models\Profil;
use App\Models\Layanan;
use App\Models\LinkTerkait;

#[Layout('components.layouts.app')]
class Beranda extends Component
{
    public function render()
    {
        return view('livewire.beranda', [
            'banners' => Banner::where('is_active', true)->orderBy('order')->get(),
            'profil' => Profil::first(),
            'layanans' => Layanan::where('is_active', true)->get(),
            'links' => LinkTerkait::all(),
        ]);
    }
}