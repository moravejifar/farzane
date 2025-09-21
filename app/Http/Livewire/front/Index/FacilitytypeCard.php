<?php

namespace App\Http\Livewire\front\Index;
use App\Models\facilility;
use Livewire\Component;

class FacilitytypeCard extends Component
{
    public $facility_type;
    public function mount ($facility_type)
    {
        $this->facility_type=$facility_type;

    }
    public function render()
    {
        return view('livewire.front.index.facilitytype-card');
    }
}
