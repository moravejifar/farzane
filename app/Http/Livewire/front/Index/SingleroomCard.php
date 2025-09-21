<?php

namespace App\Http\Livewire\front\Index;

use Livewire\Component;

class SingleroomCard extends Component
 {   public $singleroom;
        public function mount ($singleroom){
            $this->singleroom=$singleroom;

        }
    public function render()
    {
        return view('livewire.front.index.singleroom-card');
    }
}
