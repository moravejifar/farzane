<?php

namespace App\Http\Livewire\front\Index;
use App\Models\Facility;
use Livewire\Component;

class FacilityCard extends Component
{
    public $singlefacility;
    public $facilitytype_id;
    public function mount ($facilitytype_id)
    {
        // $this->facility_type=$facility_type;
        $this->singlefacility=facility::where('facilitytype_id',$facilitytype_id)->get();
        // dd( $singlefacility);
        $this->facilitytype_id=$facilitytype_id;

    }
    public function render()
    {
        return view('livewire.front.index.facility-card')
        ->layout('layouts.searchApp');
    }
}
