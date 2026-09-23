<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Galeri as GaleriModel;

#[\Livewire\Attributes\Layout('components.layouts.app')]
class Galeri extends Component
{
    use WithPagination;

    public $perPage = 6;

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function render()
    {
        // Sort by date_event descending, or latest created if date_event is null
        $galeris = GaleriModel::orderBy('date_event', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->paginate($this->perPage);

        return view('livewire.galeri', [
            'galeris' => $galeris,
        ]);
    }
}
