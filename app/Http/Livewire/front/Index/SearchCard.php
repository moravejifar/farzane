<?php

namespace App\Http\Livewire\front\Index;

use Livewire\Component;

class SearchCard extends Component
{
    public $results1="";

    public function mount ($results1=""){
        $this->results1=$results1;


    }
    public function render()
    {
        return view('livewire.front.index.search-card');
    }
}
