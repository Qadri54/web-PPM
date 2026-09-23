<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dokumen as DokumenModel;
use App\Models\KategoriDokumen;

#[\Livewire\Attributes\Layout('components.layouts.app')]
class Dokumen extends Component
{
    use WithPagination;

    public $search = '';
    public $kategoriId = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingKategoriId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = DokumenModel::with('kategori')->latest();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('code', 'like', '%' . $this->search . '%')
                  ->orWhere('tahun_terbit', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->kategoriId) {
            $query->where('kategori_id', $this->kategoriId);
        }

        $dokumens = $query->paginate(10);
        $kategoris = KategoriDokumen::orderBy('name')->get();

        return view('livewire.dokumen', [
            'dokumens' => $dokumens,
            'kategoris' => $kategoris
        ]);
    }
}
