<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pengaturan;
use App\Models\Pesan;
use Illuminate\Support\Facades\Session;

#[\Livewire\Attributes\Layout('components.layouts.app')]
class Kontak extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        Pesan::create([
            'name' => htmlspecialchars(strip_tags($this->name)),
            'email' => filter_var($this->email, FILTER_SANITIZE_EMAIL),
            'message' => htmlspecialchars(strip_tags($this->message)),
            'is_read' => false,
        ]);

        $this->reset(['name', 'email', 'message']);
        
        session()->flash('success', 'Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda!');
    }

    public function render()
    {
        return view('livewire.kontak', [
            'pengaturan' => Pengaturan::first()
        ]);
    }
}
