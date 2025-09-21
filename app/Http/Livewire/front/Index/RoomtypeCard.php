<?php

namespace App\Http\Livewire\front\Index;

use Livewire\Component;

class RoomtypeCard extends Component
{
    public $room;
    public $roomtype_id;
    public function mount ($room){
        $this->room=$room;

    }
    public function render()
    {
        return view('livewire.front.index.roomtype-card');
    }
}
