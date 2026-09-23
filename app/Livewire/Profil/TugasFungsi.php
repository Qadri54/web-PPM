<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use App\Models\TugasFungsi as Tupoksi;

#[\Livewire\Attributes\Layout('components.layouts.app')]
class TugasFungsi extends Component
{
    public $tupoksis;

    public function mount()
    {
        $this->tupoksis = Tupoksi::where('is_active', true)->orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.profil.tugas-fungsi');
    }
}