<?php

namespace App\Http\Livewire\front\Index;
use App\Models\Room;
use Livewire\Component;

class Roombook extends Component
{
    public  $singleroom;
    public  $roomtype_id;

    public function mount($roomtype_id)

    { $this->singleroom=Room::where('id',$roomtype_id)->get();

        // $this->room=Room::find($roomtype_id);
        $this->roomtype_id=$roomtype_id;


    }
    public function render()
    {
        return view('livewire.front.index.roombook')
        ->layout('layouts.searchApp');
    }
}
