<?php

namespace App\Http\Livewire\front\Index;

use Livewire\Component;

class SinglefacilityCard extends Component
{   public $singlefacility;
    public function mount ($singlefacility){
        $this->singlefacility=$singlefacility;

    }
    public function render()
    {
        return view('livewire.front.index.singlefacility-card');
    }
}
