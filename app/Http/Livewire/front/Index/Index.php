<?php

namespace App\Http\Livewire\front\Index;

// use App\Models\Facility;
use App\Models\Facility_type;
use App\Models\Room_type;
use Livewire\Component;

class Index extends Component
{
    public $newRooms;
    public $newFacility_type;
    public $newFacility;
    public $issearching=false;

    public function mount(){
        $this->newRooms=Room_type::orderBy('id','DESC')->take(9)->get();
        $this->newFacility_type=Facility_type::orderBy('facilitytype_id','DESC')->take(4)->get();
        $this->newFacility=Facility_type::orderBy('facilitytype_id','DESC')->take(4)->get();
    }
    public function render()
    {
        return view('livewire.front.index.index');
    }
}
