<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use App\Models\Profil;

#[\Livewire\Attributes\Layout('components.layouts.app')]
class Struktur extends Component
{
    public function render()
    {
        return view('livewire.profil.struktur', [
            'profil' => Profil::first()
        ]);
    }
}
