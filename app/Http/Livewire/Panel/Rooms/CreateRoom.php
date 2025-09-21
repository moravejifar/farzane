<?php

namespace App\Http\Livewire\Panel\Rooms;

use Livewire\Component;
// use App\Models\Room_type;

class CreateRoom extends Component
{
    //   public $RType;
      public function mount()
       {

        // $this->RType=Room_type::all();


    }
    public function render()
    {
        return view('livewire.panel.rooms.create-room');
    }
}
